<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Product extends Model implements Searchable{

    use Sortable;

    protected $fillable = [
        'name', 'image', 'price', 'description','count','production_date','expiration_date'
    ];

    public $sortable = [
        'name', 'price', 'count','production_date','expiration_date'
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('admin.product.search', $this->id);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    
}