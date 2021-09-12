<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motorcycle extends Model
{
    use HasFactory;

    protected $fillable = ['location_id','brand', 'motorcycle_type', 'unit_id', 'price', 'motorcycle_certificate', 'motorcycle_registration_number'];

    public static $motorcyclerules = array(
        'location_id' => 'required|integer',
        'brand' => 'required',
        'motorcycle_type' => 'required',
        'unit_id' => 'required',
        'price' => 'required|integer|digits_between:4,5',
        'motorcycle_certificate' => 'required|unique:motorcycles',
        'motorcycle_registration_number' => 'required|unique:motorcycles',
    );
    public function applications()
    {
        return $this->hasMany('App\Models\application');
    }
    //branch-----------------------------------------------------
        public function location()
        {
            return $this->belongsTo('App\Models\location');
        }
        public function getlocation_id()
        {
            return optional($this->location)->id;
        }
        public function getML_branch_id()
        {
            return optional($this->location)->ML_branch_id;
        }
        public function getlocationname()
        {
            return optional($this->location)->location_name;
        }
        public function getbranchaddress()
        {
            return optional($this->location)->branch_address;
        }
}
