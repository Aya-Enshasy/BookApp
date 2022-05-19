<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBooksRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\CategoryResource;
use App\Models\BookFav;
use App\Models\Book;
use App\Models\Categories;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function index(Book $book)
    {
        $books = $book::all();
        return response()->json([
            'massage' => 'successfully',
            'data' =>
            [
                'book' => BookResource::collection($books)
            ]

        ], 200);
    }

    //get 10 books
    public function indexBooks(Book $books)
    {
        $category = Categories::all();
        $book = $books::orderBy('id', 'desc')->take(2)->get();

        return response()->json([
            'massage' => 'successfully',
            //   'category'=> CategoryResource::collection($category),
            'data' => BookResource::collection($book)
        ], 200);
    }

    //details
    public function indexBooksDetails($id)
    {

        $book = Book::where("id", $id)->get();

        return response()->json([
            'message' => 'success',
            'data' => [
                'book' => BookResource::collection($book),
            ]
        ], 201);
    }

    //delete item
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json([
            'massage' => 'successfully',
        ], 200);
    }

    //delete all
    public function clear()
    {
        Book::truncate();
        return response()->json([
            'massage' => 'clear successfully',
        ], 200);
    }


    //add book
    public function add(StoreBooksRequest $request)
    {
        $book = Book::create([
            'id' => $request->id,
            'name' => $request->name,
            'details' => $request->details,
            'author_name' => $request->author_name,
            'price' => $request->price,
            'numberOfPage' => $request->numberOfPage,
            'languages' => $request->languages,
            'isFavorite' => $request->favorite,
            'image' => $request->image->store('public', 'public'),
            'categories_id' => $request->categories_id,
        ]);

        return [
            'massage' => 'add book successfully',
            'data' => BookResource::make($book),
        ];
    }



    public function addToFavorite($id)
    {

        $book = BookFav::find($id);
        if ($book) {
            Auth::user()->favorite($book);
            return response()->json([
                'massage' => 'add book successfully',
                'data' => BookResource::make($book),
            ], 201);
        } else {
            return response()->json([
                'massage' => 'book not found',
            ]);
        }
    }
}
