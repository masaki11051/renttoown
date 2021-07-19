<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;

    protected $fillable = ['apply_date', 'customer_id','company_id', 'motorcycle_id', 'plan_id'];

    public static $applicationrules = array(
        'apply_date' => 'required',
        'customer_id' => 'required',
        'company_id' => 'required',
        'motorcycle_id' => 'required',
        'plan_id' => 'required',
    );
    public function company()
    {
        return $this->belongsTo('App\Models\customer');
        return $this->belongsTo('App\Models\company');
        return $this->belongsTo('App\Models\motorcycle');
        return $this->belongsTo('App\Models\plan');
    }
    public function getData()
    {
            return $this ->id;
    }
}
