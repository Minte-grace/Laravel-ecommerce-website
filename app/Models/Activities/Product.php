<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name','slug','detail','price','description','quantity','image',
    ];

    public function presentPrice()
    {
        return money_format('$%i', $this->price / 100);
    }
    public function categories(){

        return $this->belongsToMany('App\Category');
    }
    protected $table = 'products';
    public $primaryKey ='id';
    public $timestamps = true;

}
