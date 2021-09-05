<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class repayment extends Model
{
    use HasFactory;
    protected $fillable = ['application_id','customer_id', 'number_of_repayment','payment_date','payment_amount', 'payment_status'];

    public static $applicationrules = array(
        'application_id' => 'required',
        'customer_id' => 'required',
        'number_of_repayment' => 'required',
        'payment_date' => 'required',
        'payment_amount' => 'required',
        'payment_status' => 'required',
    );
    //application-----------------------------------------------------
    public function application()
    {
        return $this->belongsTo('App\Models\application');
    }
    public function getapplicationapply_date()
    {
        return optional($this->application)->apply_date;
    }
    public function getapplicationstart_date()
    {
        return optional($this->application)->start_date;
    }
    public function getapplicationstatus()
    {
        return optional($this->application)->status;
    }
    //customer-----------------------------------------------------
    public function customer()
    {
        return $this->belongsTo('App\Models\customer');
    }
    public function getcustomername()
    {
        return optional($this->customer)->name;
    }
    public function getcustomerphonenumber()
    {
        return optional($this->customer)->phone_number;
    }
    public function getcustomerage()
    {
        return optional($this->customer)->age;
    }
    public function getcustomercity()
    {
        return optional($this->customer)->city;
    }
    public function getcustomermail()
    {
        return optional($this->customer)->mail;
    }
}
