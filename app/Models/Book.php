<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;
use Overtrue\LaravelFavorite\Traits\Favoriter;

class Book extends Model
{
    use HasFactory,Favoriteable;
    protected $fillable=[
        'name',
        'details',
        'author_name',
        'price',
        'numberOfPage',
        'languages' ,
        'image',
        'categories_id'
    ];
    public $table = "book";
    public function isFav(){
        if(auth()->check()){
            return auth()->user()->hasFavorited($this);
        }else{
            return false;
        }
    }

    public $timestamps = false;
    function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
