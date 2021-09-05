<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','apply_date', 'start_date','status','company_id', 'motorcycle_id','plan_id'];

    public static $applicationrules = array(
        'customer_id' => 'required',
        'apply_date' => 'required',
        'start_date' => 'required',
        'status' => 'required',
        'company_id' => 'required',
        'motorcycle_id' => 'required',
        'plan_id' => 'required',
    );
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
//company-----------------------------------------------------
    public function company()
    {
        return $this->belongsTo('App\Models\company');
    }
    public function getcompanyname()
    {
        return optional($this->company)->name;
    }
    public function getcompanyphonenumber()
    {
        return optional($this->company)->phone_number;
    }
    public function getcompanyaddress()
    {
        return optional($this->company)->address;
    }
//motorcycle-----------------------------------------------------
    public function motorcycle()
    {
        return $this->belongsTo('App\Models\motorcycle');
    }
    public function getmotorcycleid()
    {
        return optional($this->motorcycle)->id;
    }
    public function getlocationid()
    {
        return optional($this->motorcycle)->location_id;
    }
    public function getmotorcycleunit_id()
    {
        return optional($this->motorcycle)->unit_id;
    }
    public function getmotorcycleprice()
    {
        return optional($this->motorcycle)->price;
    }
    public function getmotorcyclemotorcycle_certificate()
    {
        return optional($this->motorcycle)->motorcycle_certificate;
    }
    public function getmotorcyclemotorcycle_registration_number()
    {
        return optional($this->motorcycle)->motorcycle_registration_number;
    }
    //plan-----------------------------------------------------
    public function plan()
    {
        return $this->belongsTo('App\Models\plan');
    }
    public function getplan_id()
    {
        return optional($this->plan)->id;
    }
    public function getinterest_rate()
    {
        return optional($this->plan)->interest_rate;
    }
    public function gettenure()
    {
        return optional($this->plan)->tenure;
    }
    //repayment-----------------------------------------------------
    public function repayments()
    {
        return $this->hasMany('App\Models\repayment');
    }
}
