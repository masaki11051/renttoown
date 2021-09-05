<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attachment extends Model
{
    use HasFactory;
    protected $table = "attachments";
    protected $fillable = ["customer_id","file_name","file_path"];

    public static $attachmentrules = array(
            'customer_id' => 'required',
            'file_name' => 'required',
            'file_path' => 'required',
        );
}
