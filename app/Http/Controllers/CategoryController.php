<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\CategoryResource;
use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    //get all  Categories
    public function indexCategory()
    {
        return response()->json([
            'massage' => 'successfully',
            'data' => CategoryResource::collection(Categories::all())
                ], 200);
    }

    //get  10 Categories details
    public function indexCategoryDetails(Request $request, Categories $category)
    {
        $book = $category::orderBy('id', 'desc')->take(3)->get();

        return response()->json([
            'massage' => 'successfully',
            'data' => CategoryResource::collection($book)
        ], 200);
    }

// Route::get('/category{category}', function (Request $request, Categories $category) {
//     $category->load('book');
//     $book = $category->book()->get();

//     return response()->json([
//         'massage' => 'successfully',
//         'data' => BookResource::collection($book)
//     ], 200);
// });
}
