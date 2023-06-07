<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $table = 'ekskuls';
    protected $fillable = [
        'name'
    ];

    public function students()
    {
        return $this->belongsToMany(Students::class, 'student_ekskul', 'id_ekskul', 'id_student');
    }
}
