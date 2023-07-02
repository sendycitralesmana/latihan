<?php

namespace App\Models;

use App\Models\LogActivities;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sluggable;

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

    protected static function booted(): void
    {
        static::created(function ($products) {
            LogActivities::create([
                'description' => 'create product '.$products->name
            ]);
        });
    }
}
