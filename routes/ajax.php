<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| AJAX Routes
|--------------------------------------------------------------------------
*/

/**
 * Routes per la gestione delle candidature
 */
Route::prefix('applications')
    ->as('applications.')
    ->group(function (Router $router) {
        $router->post('/accept_application', 'Ajax\\ApplicationsController@acceptApplication')->name('accept_application');
        $router->post('/refuse_application', 'Ajax\\ApplicationsController@refuseApplication')->name('refuse_application');
    });
