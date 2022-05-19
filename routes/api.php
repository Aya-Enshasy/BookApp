<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Resources\BookResource;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//--------------**start auth**-----------------
Route::post('/login', [AuthController::class, 'login']); //done
Route::post('/register', [AuthController::class, 'register']); //done
//--------------**end auth**--------------------


//--------------**start category**-----------------
Route::get('/indexCategoryDetails/{id}', [CategoryController::class, 'indexCategoryDetails']); //get 10 category
Route::get('/indexCategories', [CategoryController::class, 'indexCategory']); //done
//--------------**end category**--------------------


//--------------**start delete books**-----------------
Route::delete('/clear', [BookController::class, 'clear']); //delete all books
Route::delete('/destroy/{id}', [BookController::class, 'destroy']); //delete books id ??
//--------------**end delete books**--------------------


//--------------**start books* في مشكلة بالكاتيجوري *-----------------
Route::get('/book', [BookController::class, 'index']); //get 10 books 
Route::get('/indexBooksDetails/{id}', [BookController::class, 'indexBooksDetails']); //book id
Route::get('/indexBooks', [BookController::class, 'indexBooks']); //get all books
Route::post('/add', [BookController::class, 'add']); //

//--------------**end books**--------------------


//--------------**start fav**-----------------
Route::post('/addToFavorite/{id}', [BookController::class, 'addToFavorite'])->middleware('auth:sanctum'); //get 10 books 

//--------------**end fav**--------------------
