<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Models\create_admin;
use Carbon\Factory;
use Illuminate\Support\Facades\Hash;

// Route for frontend data

Route::get('/', [HomeController::class, 'index']);

Route::get('/product', [HomeController::class, 'showProduct']);

Route::get('/latestOffer', [HomeController::class, 'latestOffer']);

Route::get('/showBlog1', [HomeController::class, 'showblog1']);

Route::get('/showBlog2', [HomeController::class, 'showblog2']);

Route::get('/showBlog3', [HomeController::class, 'showblog3']);

Route::get('/category', [HomeController::class, 'category']);

Route::get('/adminLogin', [backController::class, 'adminLogin']);

Route::post('/admin-login', [backController::class, 'login']);




// Group route for admin

Route::group(['middleware' => 'adminAuth'], function(){

    Route::get('/admin', [backController::class, 'adminFront']);

    Route::get('/admin-logout', [backController::class, 'logout']);

    Route::resource('/admin-info', adminController::class);  // Resource route for admin configuration

});


    // Below route for controller route. Here we define all single route for single task.

    // Route::get('/addItems', [itemController::class, 'create']);

    // Route::get('/addCategory', [categoryController::class, 'create']);

    // Route::get('/addProduct', [productController::class, 'create']);

    // Route::get('/addAdmin', [adminController::class, 'addAdmin']);

    // Route::post('/create-admin', [adminController::class, 'create']);

    // Route::get('/viewAdmin', [adminController::class, 'view']);

    // Route::get('/edit-admin/{id}', [adminController::class, 'edit']);

    // Route::post('/update-admin/{id}', [adminController::class, 'update']);

    // Route::get('/delete-admin/{id}', [adminController::class, 'delete']);





// Pass dummy data
// Route::get('/dummyData', function(){
//     create_admin::create([
//         'name'=> 'tareq1',
//         'email'=> 'tareq11@g.c',
//         'phone'=> '01836135393',
//         'password'=> Hash::make('111'),
//     ]);
// });


// Route::get('/hello/{name}', [HOmeController::class, 'something']);
