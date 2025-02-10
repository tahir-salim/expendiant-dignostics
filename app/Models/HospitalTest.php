<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_fullname',
        'patient_phone',
        'patient_age',
        'patient_gender',
        'sample_delivery',
        'sub_total',
        'grand_total',
        'status',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // public function test()
    // {
    //     return $this->belongsTo(Test::class);
    // }

    public function hospitalTestDetails()
    {
        return $this->hasMany(HospitalTestDetail::class);
    }

    public function hospitalTestMaster()
    {
        return $this->hasMany(HospitalTestMaster::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    


}
