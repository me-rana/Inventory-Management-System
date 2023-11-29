<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Frontend View Management------------------------------------------------------------------------------>
Route::get('/',[FrontendController::class, 'index'] )->name('Home');
Route::get('/contact',[FrontendController::class, 'contact'])->name('Contact');
Route::post('/contact',[FrontendController::class, 'contact_submitted'])->name('Contact Submitted');
Route::get('/search', [FrontendController::class, 'myquery'])->name('Search Result');
Route::get('/product/{id}', [FrontendController::class, 'product_details'])->name('Single Product');


//Authenticate User's Management System------------------------------------------------------------------>
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [BackendController::class, 'dashboard'] )->name('Dashboard');
    Route::get('/products', [BackendController::class, 'products'])->name('Products');
    Route::get('/new-products', [BackendController::class, 'addproduct'])->name('Add Product');
    Route::post('/new-products', [BackendController::class, 'submitted'])->name('Submitted Product');
    Route::get('/update-product/{id}', [BackendController::class, 'updateproduct'])->name('Update Product');
    Route::post('/update-product/{id}', [BackendController::class, 'resubmitted'])->name('Resubmitted Product');
    Route::get('/delete-product/{id}', [BackendController::class, 'remove_product'])->name('Deleted Product');
});



