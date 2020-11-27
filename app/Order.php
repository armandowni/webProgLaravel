<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id_order';
    protected $table = 'order';

    public function users(){
        return $this->belongsTo('App\Users','id_user');
    }
    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
