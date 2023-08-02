<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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


// Route::get('/', [EmployeeController::class, 'home']);
// Route::get('/create', [EmployeeController::class, 'create']);
// Route::post('/store', [EmployeeController::class, 'store']);
// Route::post('/edit/{id}', [EmployeeController::class, 'edit']);
// Route::put('/update/{id}', [EmployeeController::class, 'update']);
// Route::delete('/delete/{id}', [EmployeeController::class, 'destroy']);
// Route::post('/search', [EmployeeController::class, 'search']);


Route::controller(EmployeeController::class)->group(function(){
    Route::get('/','home');
    Route::get('/create','create');
    Route::post('/store','store');
    Route::post('/edit/{id}','edit');
    Route::put('/update/{id}','update');
    Route::delete('/delete/{id}','destroy');
    Route::post('/search','search');
    Route::get('/edit/{id}','edit');
    Route::get('/tryhasmany','tryhasmany');
    Route::get('/trybelongsto','trybelongsto');
    Route::get('/supervisor','supervisor');
    Route::post('/view/member/{id}','viewmember');

    


});