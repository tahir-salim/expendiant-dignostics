<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class, 'category_id');
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }
}
