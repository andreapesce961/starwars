<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'people';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'birth_year',
        'eye_color',
        'gender',
        'hair_color',
        'height',
        'mass',
        'skin_color',
        'homeworld_id',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function residentsPlanets()
    {
        return $this->belongsToMany(Planet::class);
    }

    public function homeworld()
    {
        return $this->belongsTo(Planet::class, 'homeworld_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
