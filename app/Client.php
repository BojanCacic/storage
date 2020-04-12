<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'email','phone','description',
    ];

    public function cart(){
        return $this->hasManny('App\vendor\bumbummen99\shoppingcart\src\Cart.php');
    }
}
