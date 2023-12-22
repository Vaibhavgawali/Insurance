<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\UserController;

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\InsurerController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserExperienceController;
use App\Http\Controllers\UserDocumentsController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [WelcomeController::class,'index']);

Route::get('/candidate-register', [WelcomeController::class,'candidate_register']);
Route::get('/insurer-register', [WelcomeController::class,'insurer_register']);
Route::get('/institute-register', [WelcomeController::class,'institute_register']);

Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class,'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


// Route::get('/candidate-list', [AdminController::class,'candidate_list_table']);

Route::resource('admin/user', UserController::class)->middleware('auth:sanctum');


Route::resource('candidate', CandidateController::class);
Route::resource('insurer', InsurerController::class);
Route::resource('institute', InstituteController::class);

// Auth::routes();

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/dashboard', [AdminController::class,'dashboard']);

    Route::resource('user-profile', UserProfileController::class);
    Route::resource('user-address', UserAddressController::class);
    Route::resource('user-experience', UserExperienceController::class);
    Route::resource('user-documents', UserDocumentsController::class);

    Route::post('image-upload', [UserProfileController::class, 'profileImageUpload']);

    Route::get('refresh-token', [LoginController::class, 'refreshAuthToken']);
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'dashboard']);
});

Route::group(['middleware' => ['auth:sanctum','role:Superadmin']],function(){
    Route::get('admin/users/trash',[UserController::class,'trashed_users']);
    Route::patch('admin/user/restore/{id}',[UserController::class,'restore_user']);
    // Route::delete('admin/user/delete/{id}',[UserController::class,'hard_delete']);

    Route::get('/roles_wise_permission',[UserController::class,'get_roles_wise_permissions']);
    Route::post('assign-role/{id}',[UserController::class,'assignRole']);
});


