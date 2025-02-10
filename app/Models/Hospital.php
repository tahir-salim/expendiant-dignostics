<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function hospitalTestMasters()
    {
        return $this->hasMany(HospitalTestMaster::class);
    }
}
