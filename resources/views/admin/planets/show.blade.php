@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.planet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.planets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.id') }}
                        </th>
                        <td>
                            {{ $planet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.name') }}
                        </th>
                        <td>
                            {{ $planet->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.diameter') }}
                        </th>
                        <td>
                            {{ $planet->diameter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.rotation_period') }}
                        </th>
                        <td>
                            {{ $planet->rotation_period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.orbital_period') }}
                        </th>
                        <td>
                            {{ $planet->orbital_period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.gravity') }}
                        </th>
                        <td>
                            {{ $planet->gravity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.population') }}
                        </th>
                        <td>
                            {{ $planet->population }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.climate') }}
                        </th>
                        <td>
                            {{ $planet->climate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.terrain') }}
                        </th>
                        <td>
                            {{ $planet->terrain }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.surface_water') }}
                        </th>
                        <td>
                            {{ $planet->surface_water }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.residents') }}
                        </th>
                        <td>
                            @foreach($planet->residents as $key => $residents)
                                <span class="label label-info">{{ $residents->url }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.planet.fields.url') }}
                        </th>
                        <td>
                            {{ $planet->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.planets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#homeworld_people" role="tab" data-toggle="tab">
                {{ trans('cruds.person.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="homeworld_people">
            @includeIf('admin.planets.relationships.homeworldPeople', ['people' => $planet->homeworldPeople])
        </div>
    </div>
</div>

@endsection