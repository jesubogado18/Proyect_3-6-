<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('edificio', 'EdificioCrudController');
    Route::crud('piso', 'PisoCrudController');
    Route::crud('sector', 'SectorCrudController');
    Route::crud('proveedor', 'ProveedorCrudController');
    Route::crud('bienessubtipo', 'BienessubtipoCrudController');
    Route::crud('tipo-bien', 'TipoBienCrudController');
    Route::crud('dependencia', 'DependenciaCrudController');
    Route::crud('sala-tipo', 'SalaTipoCrudController');
    Route::crud('sala', 'SalaCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
