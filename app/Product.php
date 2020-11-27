<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';
    protected $table = 'products';

    public function categories(){
        return $this->BelongsTo('App\Category','id_category');
    }

    public function carts(){
        return $this->hasMany('App\Cart');
    }

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
