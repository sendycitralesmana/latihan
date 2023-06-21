<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ekskul extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = 'ekskuls';
    protected $fillable = [
        'name',
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

    public function students()
    {
        return $this->belongsToMany(Students::class, 'student_ekskul', 'id_ekskul', 'id_student');
    }
}
