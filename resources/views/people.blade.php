<h3>List of people</h3>

<table>
    <thead>
        <tr>
            <th width="10">

            </th>
            <th>
                {{ trans('cruds.person.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.name') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.birth_year') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.eye_color') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.gender') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.hair_color') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.height') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.mass') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.skin_color') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.homeworld') }}
            </th>
            <th>
                {{ trans('cruds.person.fields.url') }}
            </th>
            <th>
                &nbsp;
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($people as $key => $person)
            <tr data-entry-id="{{ $person->id }}">
                <td>

                </td>
                <td>
                    {{ $person->id ?? '' }}
                </td>
                <td>
                    {{ $person->name ?? '' }}
                </td>
                <td>
                    {{ $person->birth_year ?? '' }}
                </td>
                <td>
                    {{ $person->eye_color ?? '' }}
                </td>
                <td>
                    {{ $person->gender ?? '' }}
                </td>
                <td>
                    {{ $person->hair_color ?? '' }}
                </td>
                <td>
                    {{ $person->height ?? '' }}
                </td>
                <td>
                    {{ $person->mass ?? '' }}
                </td>
                <td>
                    {{ $person->skin_color ?? '' }}
                </td>
                <td>
                    {{ $person->homeworld->url ?? '' }}
                </td>
                <td>
                    {{ $person->url ?? '' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
