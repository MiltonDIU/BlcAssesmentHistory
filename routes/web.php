<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\AuditLogsController;
use App\Http\Controllers\UserVerificationController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\ProfilesController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\ExamTypeController;
use App\Http\Controllers\Admin\AssessmentController;
use App\Http\Controllers\Admin\AssessmentListController;
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
    return redirect(route('login'));

});
Route::get('/not-allowed',);

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});


Auth::routes(['register' => true]);
Route::get('userVerification/{token}', [UserVerificationController::class ,'approve'])->name('userVerification');
// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('not-allowed', [HomeController::class, 'notAllowed'])->name('notAllowed');
    Route::get('assessments/course-list', [AssessmentController::class,'courseList'])->name('assessments.course-list');
    Route::get('assessments/{course_code}/{course_title}/{department_id}/{department_name}/{semester}/{section_name}/{section_id}/{credit}/{student}/{courseType}', [AssessmentListController::class,'assessmentForm'])->name('assessments.assessment_form');
    Route::post('assessments/course-list', [AssessmentController::class,'courseList'])->name('assessments.course-list');
    Route::post('assessments/erp-course-list', [AssessmentController::class,'erpCourseList'])->name('assessments.erp_course_list');


    Route::resources([
        'permissions' => PermissionsController::class,
        'roles' => RolesController::class,
        'users' => UsersController::class,
        'audit-logs' => AuditLogsController::class,
        'faculties' => FacultyController::class,
        'departments' => DepartmentController::class,
        'programs' => ProgramsController::class,
        'semesters' => SemesterController::class,
        'exam-types' => ExamTypeController::class,
        'assessments' => AssessmentController::class,
        'assessment-lists' => AssessmentListController::class,
    ]);

    // Assessment List
    Route::delete('assessment-lists/destroy', [AssessmentListController::class,'massDestroy'])->name('assessment-lists.massDestroy');

    // Assessment
    Route::delete('assessments/destroy', [AssessmentController::class,'massDestroy'])->name('assessments.massDestroy');
    Route::get('assessments/{id}/edit-final', [AssessmentController::class,'edit2'])->name('assessments.editFinal');
    Route::post('assessments/{id}/edit-final', [AssessmentController::class,'finalSubmit'])->name('assessments.finalSubmit');

    // Exam Type
    Route::delete('exam-types/destroy', [ExamTypeController::class,'massDestroy'])->name('exam-types.massDestroy');
    // Semester
    // Semester
    Route::delete('semesters/destroy', [SemesterController::class,'massDestroy'])->name('semesters.massDestroy');
    // Programs
    Route::delete('programs/destroy', [ProgramsController::class,'massDestroy'])->name('programs.massDestroy');
    // Department
    Route::delete('departments/destroy', [DepartmentController::class,'massDestroy'])->name('departments.massDestroy');
    Route::post('departments/media', [DepartmentController::class,'storeMedia'])->name('departments.storeMedia');
    Route::post('departments/ckmedia', [DepartmentController::class,'storeCKEditorImages'])->name('departments.storeCKEditorImages');

    Route::get('/', [HomeController::class, 'index']);
    Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');

    // Audit Logs
    //Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Settings
//    Route::resources(['permissions' => SettingsController::class],['except' => ['create', 'store', 'show', 'destroy']]);
    Route::post('settings/media', [SettingsController::class, 'storeMedia'])->name('settings.storeMedia');
    Route::post('settings/ckmedia', [SettingsController::class, 'storeCKEditorImages'])->name('settings.storeCKEditorImages');

    Route::get('settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');

    // Faculty
    Route::delete('faculties/destroy', [SettingsController::class, 'massDestroy'])->name('faculties.massDestroy');
//profile
    Route::post('profiles/media', [ProfilesController::class, 'storeMedia'])->name('profiles.storeMedia');
    Route::post('profiles/ckmedia', [ProfilesController::class, 'storeCKEditorImages'])->name('profiles.storeCKEditorImages');



});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class,'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class,'update'])->name('password.update');
        Route::post('profile', [ChangePasswordController::class,'updateProfile'])->name('password.updateProfile');
        Route::post('profile/destroy', [ChangePasswordController::class,'destroy'])->name('password.destroyProfile');
        Route::get('my-profile', [ProfilesController::class, 'edit'])->name('my-profile.edit');
        Route::put('my-profile', [ProfilesController::class, 'update'])->name('my-profile.update');
    }
});


