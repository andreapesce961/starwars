<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanetRequest;
use App\Http\Requests\UpdatePlanetRequest;
use App\Http\Resources\Admin\PlanetResource;
use App\Models\Planet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanetApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('planet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlanetResource(Planet::with(['residents'])->get());
    }

    public function store(StorePlanetRequest $request)
    {
        $planet = Planet::create($request->all());
        $planet->residents()->sync($request->input('residents', []));

        return (new PlanetResource($planet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Planet $planet)
    {
        abort_if(Gate::denies('planet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlanetResource($planet->load(['residents']));
    }

    public function update(UpdatePlanetRequest $request, Planet $planet)
    {
        $planet->update($request->all());
        $planet->residents()->sync($request->input('residents', []));

        return (new PlanetResource($planet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Planet $planet)
    {
        abort_if(Gate::denies('planet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
