<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'test_name',
        'report_file',
    ];

    protected $casts = [
        'date' => 'date:Y-m-d',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class,'appointment_id');
    }

    public function appointmentTestReport()
    {
        return $this->belongsTo(AppointmentTestReport::class,'appointment_test_report_id');
    }

    public function report()
    {
        return $this->belongsTo(HospitalTestDetail::class,'id');
    }
    public function hospitalTest()
    {
        return $this->belongsTo(HospitalTest::class,'hospital_test_id');
    }

    public function hospitalTestDetail()
    {
        return $this->belongsTo(HospitalTestDetail::class,'hospital_test_detail_id');
    }

    
}
