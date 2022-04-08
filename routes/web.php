<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'MainController@getCards');

    Route::post('/print', 'PatientCardController@createImage');
    Route::post('/doc', 'PatientCardController@createDoc');
    Route::post('/printDoc', 'PatientCardController@printDoc');

    Route::prefix('card')->group(function () {
        Route::get('action/{status}', 'MainController@getCards');

        Route::get('create', 'MainController@createCardForm');

        Route::get('update/{id}', 'MainController@updateCardForm');

        Route::post('create', 'PatientCardController@create');

        Route::post('update/{id}', 'PatientCardController@update');

        Route::post('clipping/{id}', 'PatientCardController@clipping');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', 'UsersController@index');

        Route::prefix('users')->group(function () {
            Route::get('/', 'UsersController@index');
            Route::post('/update/{id}', 'UsersController@update');
            Route::get('/edit/{id}', 'UsersController@edit');
        });

        Route::prefix('groups')->group(function () {
            Route::get('/', 'UserGroupsController@index');
            Route::get('/create', 'UserGroupsController@form');
            Route::post('/store', 'UserGroupsController@store');
            Route::post('/update/{id}', 'UserGroupsController@update');
            Route::get('/edit/{id}', 'UserGroupsController@edit');
        });

        Route::prefix('medical_centers')->group(function () {
            Route::get('/', 'MedicalCentersController@index');
            Route::get('/create', 'MedicalCentersController@form');
            Route::post('/store', 'MedicalCentersController@store');
            Route::post('/update/{id}', 'MedicalCentersController@update');
            Route::get('/edit/{id}', 'MedicalCentersController@edit');
        });

        Route::prefix('department')->group(function () {
            Route::get('/', 'DepartmentController@index');
            Route::get('/create', 'DepartmentController@form');
            Route::post('/store', 'DepartmentController@store');
            Route::post('/update/{id}', 'DepartmentController@update');
            Route::get('/edit/{id}', 'DepartmentController@edit');
        });

        Route::prefix('organs')->group(function () {
            Route::get('/', 'OrgansController@index');
            Route::get('/create', 'OrgansController@form');
            Route::post('/store', 'OrgansController@store');
            Route::post('/update/{id}', 'OrgansController@update');
            Route::get('/edit/{id}', 'OrgansController@edit');
        });

        Route::prefix('colors')->group(function () {
            Route::get('/', 'ColorController@index');
            Route::get('/create', 'ColorController@form');
            Route::post('/store', 'ColorController@store');
            Route::post('/update/{id}', 'ColorController@update');
            Route::get('/edit/{id}', 'ColorController@edit');
        });

        Route::prefix('researches')->group(function () {
            Route::get('/', 'ResearchController@index');
            Route::get('/create', 'ResearchController@form');
            Route::post('/store', 'ResearchController@store');
            Route::post('/update/{id}', 'ResearchController@update');
            Route::get('/edit/{id}', 'ResearchController@edit');
        });
    });

    Route::get('status/update/{status}', 'PatientCardController@updateCardStatuses');

    Route::get('/template/get/{type}', 'PatientCardController@getTemplates');

    Route::post('/template/save', 'PatientCardController@createTemplate');
});

require __DIR__.'/auth.php';
