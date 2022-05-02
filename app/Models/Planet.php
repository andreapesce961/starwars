<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planet extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'planets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'diameter',
        'rotation_period',
        'orbital_period',
        'gravity',
        'population',
        'climate',
        'terrain',
        'surface_water',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function homeworldPeople()
    {
        return $this->hasMany(Person::class, 'homeworld_id', 'id');
    }

    public function residents()
    {
        return $this->belongsToMany(Person::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
