<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'address'];

    public static $companyrules = array(
        'name' => 'required',
        'phone_number' => 'required|regex:/^0\d{10}$/',
        'address' => 'required',
    );

    public function customers()
    {
        return $this->hasMany('App\Models\customer');
    }
}
