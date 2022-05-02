@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.person.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.people.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.person.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_year">{{ trans('cruds.person.fields.birth_year') }}</label>
                <input class="form-control {{ $errors->has('birth_year') ? 'is-invalid' : '' }}" type="text" name="birth_year" id="birth_year" value="{{ old('birth_year', '') }}">
                @if($errors->has('birth_year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birth_year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.birth_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="eye_color">{{ trans('cruds.person.fields.eye_color') }}</label>
                <input class="form-control {{ $errors->has('eye_color') ? 'is-invalid' : '' }}" type="text" name="eye_color" id="eye_color" value="{{ old('eye_color', '') }}">
                @if($errors->has('eye_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('eye_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.eye_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gender">{{ trans('cruds.person.fields.gender') }}</label>
                <input class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" type="text" name="gender" id="gender" value="{{ old('gender', '') }}">
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hair_color">{{ trans('cruds.person.fields.hair_color') }}</label>
                <input class="form-control {{ $errors->has('hair_color') ? 'is-invalid' : '' }}" type="text" name="hair_color" id="hair_color" value="{{ old('hair_color', '') }}">
                @if($errors->has('hair_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hair_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.hair_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="height">{{ trans('cruds.person.fields.height') }}</label>
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="number" name="height" id="height" value="{{ old('height', '') }}" step="1">
                @if($errors->has('height'))
                    <div class="invalid-feedback">
                        {{ $errors->first('height') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.height_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mass">{{ trans('cruds.person.fields.mass') }}</label>
                <input class="form-control {{ $errors->has('mass') ? 'is-invalid' : '' }}" type="number" name="mass" id="mass" value="{{ old('mass', '') }}" step="1">
                @if($errors->has('mass'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mass') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.mass_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skin_color">{{ trans('cruds.person.fields.skin_color') }}</label>
                <input class="form-control {{ $errors->has('skin_color') ? 'is-invalid' : '' }}" type="text" name="skin_color" id="skin_color" value="{{ old('skin_color', '') }}">
                @if($errors->has('skin_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skin_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.skin_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="homeworld_id">{{ trans('cruds.person.fields.homeworld') }}</label>
                <select class="form-control select2 {{ $errors->has('homeworld') ? 'is-invalid' : '' }}" name="homeworld_id" id="homeworld_id">
                    @foreach($homeworlds as $id => $entry)
                        <option value="{{ $id }}" {{ old('homeworld_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('homeworld'))
                    <div class="invalid-feedback">
                        {{ $errors->first('homeworld') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.homeworld_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.person.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}" required>
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.person.fields.url_helper') }}</span>
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