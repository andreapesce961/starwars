<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPersonRequest;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use App\Models\Planet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PeopleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('person_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $people = Person::with(['homeworld'])->get();

        $planets = Planet::get();

        return view('admin.people.index', compact('people', 'planets'));
    }

    public function create()
    {
        abort_if(Gate::denies('person_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeworlds = Planet::pluck('url', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.people.create', compact('homeworlds'));
    }

    public function store(StorePersonRequest $request)
    {
        $person = Person::create($request->all());

        return redirect()->route('admin.people.index');
    }

    public function edit(Person $person)
    {
        abort_if(Gate::denies('person_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeworlds = Planet::pluck('url', 'id')->prepend(trans('global.pleaseSelect'), '');

        $person->load('homeworld');

        return view('admin.people.edit', compact('homeworlds', 'person'));
    }

    public function update(UpdatePersonRequest $request, Person $person)
    {
        $person->update($request->all());

        return redirect()->route('admin.people.index');
    }

    public function show(Person $person)
    {
        abort_if(Gate::denies('person_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person->load('homeworld', 'residentsPlanets');

        return view('admin.people.show', compact('person'));
    }

    public function destroy(Person $person)
    {
        abort_if(Gate::denies('person_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person->delete();

        return back();
    }

    public function massDestroy(MassDestroyPersonRequest $request)
    {
        Person::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
