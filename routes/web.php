<?php

use App\Http\Controllers\admin\ModulesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\UserController;

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InsurerController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserExperienceController;
use App\Http\Controllers\UserDocumentsController;
use App\Http\Controllers\admin\RequirementsController;
use App\Http\Controllers\admin\PasswordController;
use App\Http\Controllers\CandidateQuizController;

use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
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

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/about', [WelcomeController::class, 'about']);
Route::get('/industry', [WelcomeController::class, 'industry']);
Route::get('/module', [WelcomeController::class, 'module']);
Route::get('/contact', [WelcomeController::class, 'contact']);
Route::get('/privacy', [WelcomeController::class, 'privacy']);
Route::get('/terms', [WelcomeController::class, 'terms']);




Route::get('/candidate-register', [WelcomeController::class, 'candidate_register']);
Route::get('/insurer-register', [WelcomeController::class, 'insurer_register']);
Route::get('/institute-register', [WelcomeController::class, 'institute_register']);
Route::get('/images/{filename}', [ImageController::class, 'show'])->name('image.show');


Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/reset-password', [PasswordController::class,'resetPasswordForm']);
Route::post('/reset-password', [PasswordController::class, 'resetPassword']);

Route::resource('admin/user', UserController::class)->middleware('auth:sanctum');
Route::resource('candidate', CandidateController::class);

Route::get('/getCandidateTableData', [CandidateController::class, 'getCandidateTableData'])->name('getCandidateTableData');

Route::resource('insurer', InsurerController::class);
Route::get('/getInsurerTableData', [InsurerController::class, 'getInsurerTableData'])->name('getInsurerTableData');

Route::resource('institute', InstituteController::class);
Route::get('/getInstituteTableData', [InstituteController::class, 'getInstituteTableData'])->name('getInstituteTableData');

Route::resource('module-1', ModulesController::class);
// Auth::routes();

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('user-profile', UserProfileController::class);
    Route::resource('user-address', UserAddressController::class);
    Route::resource('user-experience', UserExperienceController::class);
    Route::resource('user-documents', UserDocumentsController::class);
    Route::post('user-documents-update/{id}', [UserDocumentsController::class, 'update'])->name('update');

    Route::resource('requirements', RequirementsController::class);
    Route::get('/getRequirementsTableData', [RequirementsController::class, 'getRequirementsTableData'])->name('getRequirementsTableData');



    Route::post('image-upload', [UserProfileController::class, 'profileImageUpload']);

    Route::get('refresh-token', [LoginController::class, 'refreshAuthToken']);
    Route::get('/home', [App\Http\Controllers\AdminController::class, 'dashboard']);
});


Route::group(['middleware' => ['auth:sanctum', 'role:Superadmin']], function () {
    Route::get('admin/users/trash', [UserController::class, 'trashed_users']);
    Route::patch('admin/user/restore/{id}', [UserController::class, 'restore_user']);
    // Route::delete('admin/user/delete/{id}',[UserController::class,'hard_delete']);

    Route::get('/roles_wise_permission', [UserController::class, 'get_roles_wise_permissions']);
    Route::post('assign-role/{id}', [UserController::class, 'assignRole']);

    Route::resource('quizes', QuizController::class);
    Route::get('show_quiz/{quiz_id}',[QuizController::class,'show_quiz']);
    Route::resource('questions', QuestionController::class);
    Route::resource('answers', AnswerController::class);
});


// Route::group(['middleware'=>['auth:sanctum']],function(){
Route::resource('candidate-quizes', CandidateQuizController::class);
Route::post('submit-quiz/{quiz_id}', [CandidateQuizController::class, 'submit']);
Route::get('/start-quiz', [CandidateQuizController::class, 'startQuiz']);
// });
Route::get('generate-pdf', [CandidateQuizController::class, 'generatePDF']);
Route::get('generate-candidate-profile-pdf/{id}', [CandidateController::class, 'downloadCandidateProfilePDF']);


