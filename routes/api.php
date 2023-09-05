<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // //stores a single product
    Route::post('/products', [ProductController::class, 'store']);
    // //stores a single product
    Route::put('/products/{id}', [ProductController::class, 'update']);
    // //stores a single product
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    //Logout Route
    Route::post('/logout', [AuthController::class, 'logout']);
});


// Public routes
//search for products
Route::get('/products/search/{name}', [ProductController::class, 'search']);
//get all products
Route::get('/products', [ProductController::class, 'index']);
//gets a single product
Route::get('/products/{id}', [ProductController::class, 'show']);
//Register Route
Route::post('/register', [AuthController::class, 'register']);
//Login Route
Route::post('/login', [AuthController::class, 'login']);


//You can separate each route, or if your API has all the basic CRUD routes, you can use resource instead
//This will capture all /products routes and call the respective class method for all the CRUD operations
// Route::resource('products', ProductController::class);
