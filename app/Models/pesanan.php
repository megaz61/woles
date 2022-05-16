<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function pesanan_detail(){
        return $this->hasMany('App\Models\pesananDetail','pesanan_id','id');
    }
}
