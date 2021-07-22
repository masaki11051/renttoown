<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motorcycle extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'motorcycle_type', 'unit_id', 'price', 'motorcycle_certificate', 'motorcycle_registration_number'];

    public static $motorcyclerules = array(
        'brand' => 'required',
        'motorcycle_type' => 'required',
        'unit_id' => 'required',
        'price' => 'required|integer|digits_between:5,6',
        'motorcycle_certificate' => 'required',
        'motorcycle_registration_number' => 'required',
    );
    public function applications()
    {
        return $this->hasMany('App\Models\application');
    }
}
