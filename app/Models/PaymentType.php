<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', true);
    }
}
