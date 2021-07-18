<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;

    protected $fillable = ['start_date', 'interest_rate', 'tenure',];

    public static $planrules = array(
        'start_date' => 'required',
        'interest_rate' => 'required',
        'tenure' => 'required',
    );
}
