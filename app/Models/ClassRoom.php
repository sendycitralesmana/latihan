<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'class';
    protected $fillable = [
        'name',
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
