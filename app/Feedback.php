<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $primaryKey = 'id_feedback';
    protected $table = 'feedbacks';

    public function users(){
        return $this->belongsTo('App\Users','id_user');
    }
}