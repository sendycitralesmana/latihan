<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'name',
        'nis',
        'gender',
        'id_class',
        'image',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'id_class', 'id');
    }

    // public function school()
    // {
    //     return $this->belongsTo(School::class, 'id_school', 'id');
    // }

    public function ekskuls()
    {
        return $this->belongsToMany(Ekskul::class, 'student_ekskul', 'id_student', 'id_ekskul');
    }
}
