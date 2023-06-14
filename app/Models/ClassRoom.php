<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'class';
    protected $fillable = [
        'name',
        'id_teacher',
        'slug'
    ];

    public function students()
    {
        return $this->hasMany(Students::class, 'id_class', 'id');
    }

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher', 'id');
    }
}
