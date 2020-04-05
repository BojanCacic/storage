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

    public $sortable = [
        'name', 'address', 'city', 'email','phone',
    ];
}
