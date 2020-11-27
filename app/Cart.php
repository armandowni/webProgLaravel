<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'id_cart';
    protected $table = 'cart';

    public function products(){
        return $this->belongsTo('App\Product','id_product');
    }
    public function users(){
        return $this->belongsTo('App\Users','id_user');
    }

    public function getTotalPrice() {
        return $this->products()->sum(function($buyDetail) {
            return $buyDetail->product_price * $buyDetail->product_quantity;
        });
    }
}