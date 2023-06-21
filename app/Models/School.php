<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    // public function students()
    // {
    //     return $this->hasMany(Students::class, 'id_class', 'id');
    // }
}
