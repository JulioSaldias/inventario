<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\RoleController;
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

Route::get('/', inicioController::class);


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::controller(productoController::class)->group(function(){

        route::get('producto', 'principal')->name('producto.principal');
    
        Route::get('producto/{variable}/mostrar', 'mostrar')->name('producto.mostrar');
    
    
        route::get('producto/crear', 'crear')->name('producto.crear');
    
        route::post('producto','store')->name('producto.store');
    
        
        route::get('producto/{producto}/edit', 'editar')->name('producto.editar');
    
        route::put('producto/{producto}','update')->name('producto.update');
    
        route::delete('prodcuto/{id}','borrar')->name('producto.borrar');
    
        route::get('desactiva/{id}','desactivaproducto')->name('desactivapro');
        
        route::get('activa/{id}','activaproducto')->name('activapro');
    
    
    });

});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::controller(categoriaController::class)->group(function () {
        Route::get('categoria', 'principal')->name('categoria.principal');
        Route::get('categoria/crear',  'crear')->name('categoria.crear');
        Route::post('categoria',  'store')->name('categoria.store');
        Route::get('categoria/{variable}',  'mostrar')->name('categoria.mostrar');
        Route::get('categoria/{categoria}/edit',  'editar')->name('categoria.editar');
        Route::put('categoria/{categoria}', 'update')->name('categoria.update');
        Route::delete('categoria/{id}', 'borrar')->name('categoria.borrar');
        Route::get('desactiva-categoria/{id}', 'desactivacategoria')->name('desactivacat');
        Route::get('activa-categoria/{id}', 'activacategoria')->name('activacat');
    });
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::controller(RoleController::class)->group(function () {
        Route::get('role', 'principal')->name('role.principal');
        Route::get('role/crear', 'crear')->name('role.crear');
        Route::post('role', 'store')->name('role.store');
        Route::get('role/{variable}', 'mostrar')->name('role.mostrar');
        Route::get('role/{role}/edit', 'editar')->name('role.editar');
        Route::put('role/{role}', 'update')->name('role.update');
        Route::delete('role/{id}', 'borrar')->name('role.borrar');
        Route::get('desactiva-role/{id}', 'desactivarole')->name('desactivarole');
        Route::get('activa-role/{id}', 'activarole')->name('activarole');
    });
});