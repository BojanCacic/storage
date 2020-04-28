<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model{

    use Sortable;

    protected $fillable = [
        'name', 'image', 'price', 'description','count','production_date','expiration_date'
    ];

    public $sortable = [
        'name', 'price', 'count','production_date','expiration_date'
    ];

    public function cart(){
        return $this->belongsToManny('App\vendor\bumbummen99\shoppingcart\src\Cart.php');
    }
}