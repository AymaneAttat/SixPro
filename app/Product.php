<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name' , 'description' , 'DetailDescription', 'category_id', 'manufacture_id', 'prix', 'shipping_cost', 'image', 'size', 'color', 'status'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function manufacture(){
        return $this->belongsTo('App\Manufacture');
    }
}