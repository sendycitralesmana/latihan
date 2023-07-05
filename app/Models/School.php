<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory, Searchable;
    // add SCOUT_DRIVER=database di .env

    protected $connection = 'mysql2';

    public function toSearchableArray(): array
{
    return [
        'name' => $this->name
    ];
}

    // public function students()
    // {
    //     return $this->hasMany(Students::class, 'id_class', 'id');
    // }
}
