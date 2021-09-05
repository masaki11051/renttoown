<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

    protected $fillable = ['ML_branch_id', 'location_name', 'branch_address'];

    public static $locationrules = array(
        'ML_branch_id' => 'required',
        'location_name' => 'required',
        'branch_address' => 'required',
    );
    public function motorcycles()
    {
        return $this->hasMany('App\Models\motorcycle');
    }
}

