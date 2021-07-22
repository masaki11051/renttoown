<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;

    protected $fillable = ['plan_name', 'interest_rate', 'tenure',];

    public static $planrules = array(
        'plan_name' => 'required',
        'interest_rate' => 'required',
        'tenure' => 'required',
    );
    public function applications()
    {
        return $this->hasMany('App\Models\application');
    }
}
