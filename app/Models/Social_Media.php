<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social_Media extends Model
{
    use HasFactory;
    protected $table = 'social_media';
    protected $fillable = [
        'id_customer',
        'social_media',
        'username'
    ];
}
