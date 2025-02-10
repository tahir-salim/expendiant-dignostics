<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTestReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
    ];

    public function tests()
    {
        return $this->belongsTo(Test::class,'test_id','id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
