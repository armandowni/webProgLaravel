<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = 'id_user';
    protected $table = 'users';

    public function carts(){
        return $this->hasMany('App\Cart');
    }

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function feedbacks(){
        return $this->hasMany('App\Feedback');
    }
}