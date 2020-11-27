<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'id_transaction';
    protected $table = 'transactions';

    public function orders(){
        return $this->belongsTo('App\Order','id_order');
    }

    public function users(){
        return $this->belongsTo('App\Users', 'id_user');
    }
}