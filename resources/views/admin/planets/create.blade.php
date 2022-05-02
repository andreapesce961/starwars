@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.planet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.planets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.planet.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="diameter">{{ trans('cruds.planet.fields.diameter') }}</label>
                <input class="form-control {{ $errors->has('diameter') ? 'is-invalid' : '' }}" type="number" name="diameter" id="diameter" value="{{ old('diameter', '') }}" step="1">
                @if($errors->has('diameter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('diameter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.diameter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rotation_period">{{ trans('cruds.planet.fields.rotation_period') }}</label>
                <input class="form-control {{ $errors->has('rotation_period') ? 'is-invalid' : '' }}" type="number" name="rotation_period" id="rotation_period" value="{{ old('rotation_period', '') }}" step="1">
                @if($errors->has('rotation_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rotation_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.rotation_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="orbital_period">{{ trans('cruds.planet.fields.orbital_period') }}</label>
                <input class="form-control {{ $errors->has('orbital_period') ? 'is-invalid' : '' }}" type="number" name="orbital_period" id="orbital_period" value="{{ old('orbital_period', '') }}" step="1">
                @if($errors->has('orbital_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('orbital_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.orbital_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gravity">{{ trans('cruds.planet.fields.gravity') }}</label>
                <input class="form-control {{ $errors->has('gravity') ? 'is-invalid' : '' }}" type="number" name="gravity" id="gravity" value="{{ old('gravity', '') }}" step="0.01">
                @if($errors->has('gravity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gravity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.gravity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="population">{{ trans('cruds.planet.fields.population') }}</label>
                <input class="form-control {{ $errors->has('population') ? 'is-invalid' : '' }}" type="number" name="population" id="population" value="{{ old('population', '') }}" step="1">
                @if($errors->has('population'))
                    <div class="invalid-feedback">
                        {{ $errors->first('population') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.population_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="climate">{{ trans('cruds.planet.fields.climate') }}</label>
                <input class="form-control {{ $errors->has('climate') ? 'is-invalid' : '' }}" type="text" name="climate" id="climate" value="{{ old('climate', '') }}">
                @if($errors->has('climate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('climate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.climate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="terrain">{{ trans('cruds.planet.fields.terrain') }}</label>
                <input class="form-control {{ $errors->has('terrain') ? 'is-invalid' : '' }}" type="text" name="terrain" id="terrain" value="{{ old('terrain', '') }}">
                @if($errors->has('terrain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('terrain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.terrain_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="surface_water">{{ trans('cruds.planet.fields.surface_water') }}</label>
                <input class="form-control {{ $errors->has('surface_water') ? 'is-invalid' : '' }}" type="number" name="surface_water" id="surface_water" value="{{ old('surface_water', '') }}" step="1">
                @if($errors->has('surface_water'))
                    <div class="invalid-feedback">
                        {{ $errors->first('surface_water') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.surface_water_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="residents">{{ trans('cruds.planet.fields.residents') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('residents') ? 'is-invalid' : '' }}" name="residents[]" id="residents" multiple>
                    @foreach($residents as $id => $resident)
                        <option value="{{ $id }}" {{ in_array($id, old('residents', [])) ? 'selected' : '' }}>{{ $resident }}</option>
                    @endforeach
                </select>
                @if($errors->has('residents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('residents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.residents_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.planet.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}" required>
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.planet.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection