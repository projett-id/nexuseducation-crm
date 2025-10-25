<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// use Spatie\Permission\Middleware\RoleMiddleware;
// use Spatie\Permission\Middleware\PermissionMiddleware;


use App\Http\Controllers\Backoffice\RoleController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentEmergencyContactController;
use App\Http\Controllers\StudentAddressController;
use App\Http\Controllers\StudentAcademicHistoryController;
use App\Http\Controllers\StudentWorkDetailController;
use App\Http\Controllers\StudentDocumentController;
use App\Http\Controllers\StudentAcademicInterestController;
use App\Http\Controllers\StudentExamScoreController;
use App\Http\Controllers\StudentRefereeController;
use App\Http\Controllers\MasterDocumentController;

use App\Http\Controllers\Backoffice\PermissionController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Backoffice\NewsController;
use App\Http\Controllers\Backoffice\EventController;
use App\Http\Controllers\Backoffice\TestimonialsController;
use App\Http\Controllers\Backoffice\CountryController;
use App\Http\Controllers\Backoffice\CategoryController;
use App\Http\Controllers\Backoffice\TagController;
use App\Http\Controllers\Backoffice\VisaController;
use App\Http\Controllers\Backoffice\PartnerSchoolController;
use App\Http\Controllers\Backoffice\ProgramTypeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/country/{name}', [CountryController::class, 'detailFE'])
    ->name('fe.country.detail')
    ->where('name', '[A-Za-z0-9\-]+');

Route::get('/school/{name}', [PartnerSchoolController::class, 'detailFE'])
    ->name('fe.school.detail')
    ->where('name', '[A-Za-z0-9\-]+');

Route::match(['get', 'post'], '/start-your-journey',[HomeController::class, 'start_your_journey'])->name('start-your-journey-url');
Route::match(['get', 'post'], '/partner-with-us', [HomeController::class, 'partner_with_us'])->name('partner-us-url');

Route::get('/dashboard', function () {
    return view('admin.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('backoffice')
    ->middleware(['auth', 'role:superadmin|admin'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('master-document', MasterDocumentController::class);
        Route::resource('country', CountryController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('users', UserController::class);
});
Route::resource('student', StudentController::class);
Route::prefix('student')->as('student.')->middleware(['auth', 'role:superadmin|admin|student'])->group(function () {
    Route::resource('emergency-contact', StudentEmergencyContactController::class);
    Route::resource('address', StudentAddressController::class);
    Route::post('destination-country', [StudentAcademicHistoryController::class, 'storeDestinationCountry'])->name('destination-country.store');
    Route::resource('academic-history', StudentAcademicHistoryController::class)->except(['index', 'show', 'create', 'edit']);
    Route::resource('work-detail', StudentWorkDetailController::class)->except(['index', 'show', 'create', 'edit']);
    Route::resource('document', StudentDocumentController::class)->except(['index', 'show', 'create', 'edit']);
    Route::resource('academic-interest', StudentAcademicInterestController::class)->except(['index', 'show', 'create', 'edit']);
    Route::resource('exam-score', StudentExamScoreController::class)->except(['index', 'show', 'create', 'edit']);
    Route::resource('referee', StudentRefereeController::class)->except(['index', 'show', 'create', 'edit']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
