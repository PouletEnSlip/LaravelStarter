<?php

use Illuminate\Support\Facades\Route;

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

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('accueil.index');
});

Route::get('/livres', function () {
    $livres = Book::all();
    $categories = Category::all();
    return view('livres.index', compact('livres', 'categories'));
});

Route::post('/livres', [LivreController::class, 'store']);

Route::get('/livres/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');

Route::put('/livres/{livre}', [LivreController::class, 'update'])->name('livres.update');

Route::delete('/livres/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');

Route::get('/categories', function () {
    $livres = Book::all();
    $categories = Category::all();
    return view('categories.index', compact('livres', 'categories'));
});

Route::post('/categories', [CategoryController::class, 'store']);

Route::get('/categories/{categorie}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::put('/categories/{categorie}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/categories/{categorie}', [CategoryController::class, 'destroy'])->name('categories.destroy');
