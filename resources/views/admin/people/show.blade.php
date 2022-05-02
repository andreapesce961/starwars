@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.person.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.people.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.id') }}
                        </th>
                        <td>
                            {{ $person->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.name') }}
                        </th>
                        <td>
                            {{ $person->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.birth_year') }}
                        </th>
                        <td>
                            {{ $person->birth_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.eye_color') }}
                        </th>
                        <td>
                            {{ $person->eye_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.gender') }}
                        </th>
                        <td>
                            {{ $person->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.hair_color') }}
                        </th>
                        <td>
                            {{ $person->hair_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.height') }}
                        </th>
                        <td>
                            {{ $person->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.mass') }}
                        </th>
                        <td>
                            {{ $person->mass }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.skin_color') }}
                        </th>
                        <td>
                            {{ $person->skin_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.homeworld') }}
                        </th>
                        <td>
                            {{ $person->homeworld->url ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.person.fields.url') }}
                        </th>
                        <td>
                            {{ $person->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.people.index') }}">
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
            <a class="nav-link" href="#residents_planets" role="tab" data-toggle="tab">
                {{ trans('cruds.planet.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="residents_planets">
            @includeIf('admin.people.relationships.residentsPlanets', ['planets' => $person->residentsPlanets])
        </div>
    </div>
</div>

@endsection