<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalTestDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'status',
    ];

    public function hospitalTest()
    {
        return $this->belongsTo(HospitalTest::class,'hospital_test_id');
    }

    public function test()
    {
        return $this->belongsTo(Test::class,'test_id');
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
