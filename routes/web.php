<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReportController;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $search = $request->query('search');

    if ($search) {
        $categories = Category::with(['menus' => function($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        }])->whereHas('menus', function($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        })->get();
    } else {
        $categories = Category::with('menus')->get();
    }

    return view('welcome', compact('categories', 'search'));
});

// Route Keranjang
Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
Route::post('/keranjang/tambah/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/keranjang/hapus/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/keranjang/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// Route Dashboard Admin
Route::get('/dashboard', function () {
    $totalKategori = Category::count();
    $totalMenu = Menu::count();
    return view('dashboard', compact('totalKategori', 'totalMenu'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('categories', CategoryController::class);
    Route::resource('menus', MenuController::class);
    
    // Route Laporan
    Route::get('/laporan', [ReportController::class, 'index'])->name('report.index');
    Route::get('/laporan/cetak', [ReportController::class, 'print'])->name('report.print');
});

require __DIR__.'/auth.php';