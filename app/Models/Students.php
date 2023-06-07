<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nis',
        'gender',
        'id_class'
    ];

    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'id_class', 'id');
    }

    public function ekskuls()
    {
        return $this->belongsToMany(Ekskul::class, 'student_ekskul', 'id_student', 'id_ekskul');
    }
}
