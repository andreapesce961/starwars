<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'person' => [
        'title'          => 'People',
        'title_singular' => 'Person',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'birth_year'        => 'Birth Year',
            'birth_year_helper' => ' ',
            'eye_color'         => 'Eye Color',
            'eye_color_helper'  => ' ',
            'gender'            => 'Gender',
            'gender_helper'     => ' ',
            'hair_color'        => 'Hair Color',
            'hair_color_helper' => ' ',
            'height'            => 'Height',
            'height_helper'     => ' ',
            'mass'              => 'Mass',
            'mass_helper'       => ' ',
            'skin_color'        => 'Skin Color',
            'skin_color_helper' => ' ',
            'url'               => 'Url',
            'url_helper'        => ' ',
            'homeworld'         => 'Homeworld',
            'homeworld_helper'  => ' ',
        ],
    ],
    'planet' => [
        'title'          => 'Planet',
        'title_singular' => 'Planet',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'diameter'               => 'Diameter',
            'diameter_helper'        => ' ',
            'rotation_period'        => 'Rotation Period',
            'rotation_period_helper' => ' ',
            'orbital_period'         => 'Orbital Period',
            'orbital_period_helper'  => ' ',
            'gravity'                => 'Gravity',
            'gravity_helper'         => ' ',
            'population'             => 'Population',
            'population_helper'      => ' ',
            'climate'                => 'Climate',
            'climate_helper'         => ' ',
            'terrain'                => 'Terrain',
            'terrain_helper'         => ' ',
            'surface_water'          => 'Surface Water',
            'surface_water_helper'   => ' ',
            'residents'              => 'Residents',
            'residents_helper'       => ' ',
            'url'                    => 'Url',
            'url_helper'             => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
];
