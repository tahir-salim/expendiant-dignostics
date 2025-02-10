<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalTestMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'grand_total',
        'no_of_patients',
        'no_of_test',
        'sample_delivery_type',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date:Y-m-d',
        'master_time' => 'datetime:Y-m-d',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    public function hospitalTests()
    {
        return $this->hasMany(HospitalTest::class, 'hospital_test_master_id');
    }
}
