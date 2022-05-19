<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriter;

class BookFav extends Model
{
    use HasFactory,Favoriter;
    public $table = "book_favs";

}
