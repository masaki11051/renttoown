<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'phone_number', 'city', 'mail'];

    public static $rules = array(
        'name' => 'required',
        'age' => 'integer|min:21|max:60',
        'phone_number' => 'required|regex:/^0\d{10}$/',
        'city' =>'required',
        'mail' => 'required|regex:/^[a-zA-Z0-9-_\.]+@[a-zA-Z0-9-_\.]+$/',
    );

    public function attachments()
    {

        return $this->hasMany('App\Attachment', 'parent_id', 'id')
            ->where('model', self::class);  // 「App\Customer」のものだけ取得

    }
    public function getData()
    {
        return $this->id . ':' . $this->name;
    }
    public function applications()
    {
        return $this->hasMany('App\Models\application');
    }
}
