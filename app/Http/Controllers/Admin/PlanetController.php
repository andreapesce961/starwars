<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlanetRequest;
use App\Http\Requests\StorePlanetRequest;
use App\Http\Requests\UpdatePlanetRequest;
use App\Models\Person;
use App\Models\Planet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanetController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('planet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planets = Planet::with(['residents'])->get();

        $people = Person::get();

        return view('admin.planets.index', compact('people', 'planets'));
    }

    public function create()
    {
        abort_if(Gate::denies('planet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $residents = Person::pluck('url', 'id');

        return view('admin.planets.create', compact('residents'));
    }

    public function store(StorePlanetRequest $request)
    {
        $planet = Planet::create($request->all());
        $planet->residents()->sync($request->input('residents', []));

        return redirect()->route('admin.planets.index');
    }

    public function edit(Planet $planet)
    {
        abort_if(Gate::denies('planet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $residents = Person::pluck('url', 'id');

        $planet->load('residents');

        return view('admin.planets.edit', compact('planet', 'residents'));
    }

    public function update(UpdatePlanetRequest $request, Planet $planet)
    {
        $planet->update($request->all());
        $planet->residents()->sync($request->input('residents', []));

        return redirect()->route('admin.planets.index');
    }

    public function show(Planet $planet)
    {
        abort_if(Gate::denies('planet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planet->load('residents', 'homeworldPeople');

        return view('admin.planets.show', compact('planet'));
    }

    public function destroy(Planet $planet)
    {
        abort_if(Gate::denies('planet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planet->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlanetRequest $request)
    {
        Planet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
