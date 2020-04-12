<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use Sortable;

    protected $fillable = [
        'name', 'address', 'city', 'email','phone','description',
    ];

<<<<<<< HEAD
    public function cart(){
        return $this->hasManny('App\vendor\bumbummen99\shoppingcart\src\Cart.php');
    }
=======
    public $sortable = [
        'name', 'address', 'city', 'email','phone',
    ];
>>>>>>> cdf657cd74d6faaaee4e02db610bc80a4fb38944
}
