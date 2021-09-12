<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'phone_number', 'city', 'mail'];

    public static $rules = array(
        'name' => 'required',
        'age' => 'integer|min:21|max:60',
        'phone_number' => 'required|regex:/^0\d{10}$/|unique:customers',
        'city' =>'required',
        'mail' => 'required|regex:/^[a-zA-Z0-9-_\.]+@[a-zA-Z0-9-_\.]+$/|unique:customers',
    );


    //application-----------------------------------------------------
    public function getData()
    {
        return $this->id . ':' . $this->name;
    }
    public function applications()
    {
        return $this->hasMany('App\Models\application');
    }
     public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }
    //repayment-----------------------------------------------------
    public function repayments()
    {
        return $this->hasMany('App\Models\repayment');
    }
}
