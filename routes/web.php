<?php

use App\Livewire\Cart\CartComponent;
use App\Livewire\Category\CategoryComponent;
use App\Livewire\Product\ProductComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Inicio;
use App\Livewire\Category\CategoryShow;
use App\Livewire\Client\ClientComponent;
use App\Livewire\Product\ProductShow;
use App\Livewire\Product\PublicProducts;

//Route::get('/', PublicProducts::class)->name('home');
// Route::get('/', function(){
//     return view('components.layouts.public_access');
// })->name('start');
Route::get('/', PublicProducts::class)->name('start');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



// Usuario rol: 'admin'
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', Inicio::class)->name('dashboard');
    //Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
    // Categorías
    Route::get('/categorias', CategoryComponent::class)->name('category');
    Route::get('/ver_categoria/{category}', CategoryShow::class)->name('categoryShow');
    // Productos
    Route::get('/productos', ProductComponent::class)->name('product');
    Route::get('/ver_producto/{product}', ProductShow::class)->name('productShow');
    // Clientes
    Route::get('/clientes', ClientComponent::class)->name('client');
});

// Usuarios autenticados rol: 'user'
Route::middleware(['auth'])->group(function () {

    // Inicio clientes
    Route::get('/home', PublicProducts::class)->name('home');

    //Cesta de la compra
    Route::get('/cesta_compra', CartComponent::class)->name('cart');

});
