<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
    return view('index');
});

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::post('/contact', [TestController::class,'insert'])->name('taskinsert');
Route::get('/contact', [TestController::class,'home'])->name('contact');
Route::get('edittest/{id}', [TestController::class,'edit'])->name('edittest');
Route::put('testupdate', [TestController::class,'update'])->name('updatetest');
Route::get('deletetask/{id}', [TestController::class,'deletetask'])->name('deletetask');



Route::post('employee-add', [EmployeeController::class, 'employee_add']);
Route::get('employee-view', [EmployeeController::class, 'employee_view']);
Route::get('employee-delete', [EmployeeController::class, 'employee_delete']);
Route::post('employee-edit', [EmployeeController::class, 'employee_edit']);
Route::get('employee-list', [EmployeeController::class, 'employee_list']);

Route::controller(PostController::class)->group(function(){
    Route::get('posts', 'index');
    Route::post('posts', 'store')->name('posts.store');
});

Route::get('/index', [EmployeController::class, 'index']);
Route::post('/store', [EmployeController::class, 'store'])->name('store');
Route::get('/fetchall', [EmployeController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [EmployeController::class, 'delete'])->name('delete');
Route::get('/edit', [EmployeController::class, 'edit'])->name('edit');
Route::post('/update', [EmployeController::class, 'update'])->name('update');

//login

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
//login end 
Route::group(['middleware' => 'prevent-back-history'],function(){
	Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', [LoginController::class, 'dashboard']); 
//Route::get('/', function () {
   // return view('welcome');
//});
//Auth::routes();
//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class);
Route::group(['middleware' => ['auth']], function() {

    
    
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

});