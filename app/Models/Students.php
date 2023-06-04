<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    public function class()
    {
        return $this->belongsTo(ClassRoom::class, 'id_class', 'id');
    }
}
