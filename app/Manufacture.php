<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $table = 'manufactures';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'description', 'status'];
    public function products(){
        return $this->hasMany('App\Product');
    }
}
