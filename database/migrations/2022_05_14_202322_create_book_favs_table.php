<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookFavsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('book_favs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(config('favorite.user_foreign_key'))->index()->comment('user_id');
            $table->morphs('favoriteable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_favs');
    }
}
