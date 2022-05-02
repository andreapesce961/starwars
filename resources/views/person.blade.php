<h3>Person {{ $person->id }}</h3>

<table>
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
                {{ trans('cruds.person.fields.url') }}
            </th>
            <td>
                {{ $person->url }}
            </td>
        </tr>
    </tbody>
</table>

<br>

<h3>Planet details</h3>

<table>
    <tbody>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.name') }}
            </th>
            <td>
                {{ $person->homeworld->name }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.diameter') }}
            </th>
            <td>
                {{ $person->homeworld->diameter }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.rotation_period') }}
            </th>
            <td>
                {{ $person->homeworld->rotation_period }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.orbital_period') }}
            </th>
            <td>
                {{ $person->homeworld->orbital_period }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.gravity') }}
            </th>
            <td>
                {{ $person->homeworld->gravity }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.population') }}
            </th>
            <td>
                {{ $person->homeworld->population }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.climate') }}
            </th>
            <td>
                {{ $person->homeworld->climate }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.terrain') }}
            </th>
            <td>
                {{ $person->homeworld->terrain }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.surface_water') }}
            </th>
            <td>
                {{ $person->homeworld->surface_water }}
            </td>
        </tr>
        <tr>
            <th>
                {{ trans('cruds.planet.fields.url') }}
            </th>
            <td>
                {{ $person->homeworld->url }}
            </td>
        </tr>
    </tbody>
</table>
