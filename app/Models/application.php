<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class application extends Model
{
    use HasFactory;

    protected $fillable = ['apply_date'];

    public static $applicationrules = array(
        'company_id' => 'required',
        'apply_date' => 'required',
    );

    public function getData()
    {
            return $this ->id;
    }
}
