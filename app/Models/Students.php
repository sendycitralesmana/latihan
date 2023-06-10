<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'nis',
        'gender',
        'id_class',
        'image'
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
