<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motorcycle extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'motorcycle_type', 'price', 'motorcycle_certificate', 'motorcycle_registration_number'];

    public static $motorcyclerules = array(
        'brand' => 'required',
        'motorcycle_type' => 'required',
        'price' => 'required|integer|digits_between:5,6',
        'motorcycle_certificate' => 'required',
        'motorcycle_registration_number' => 'required',
    );
}
