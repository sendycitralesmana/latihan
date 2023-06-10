<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ekskul extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ekskuls';
    protected $fillable = [
        'name'
    ];

    public function students()
    {
        return $this->belongsToMany(Students::class, 'student_ekskul', 'id_ekskul', 'id_student');
    }
}
