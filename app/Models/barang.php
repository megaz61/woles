<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pesanan_detail(){
        return $this->hasMany('App\Models\pesananDetail','barang_id','id');
    }
    public function pesanan(){
        return $this->belongsTo('App\Models\pesanan','pesanan_id','id');
    }
}
