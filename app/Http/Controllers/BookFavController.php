<?php

namespace App\Http\Controllers;

use App\Models\BookFav;
use App\Http\Requests\StoreBookFavRequest;
use App\Http\Requests\UpdateBookFavRequest;

class BookFavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookFavRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookFavRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookFav  $bookFav
     * @return \Illuminate\Http\Response
     */
    public function show(BookFav $bookFav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookFav  $bookFav
     * @return \Illuminate\Http\Response
     */
    public function edit(BookFav $bookFav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookFavRequest  $request
     * @param  \App\Models\BookFav  $bookFav
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookFavRequest $request, BookFav $bookFav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookFav  $bookFav
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookFav $bookFav)
    {
        //
    }
}
