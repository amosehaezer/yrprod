<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'sesi',
        'phone_number', 
        'asal_gereja_atau_organisasi', 
        'line_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
