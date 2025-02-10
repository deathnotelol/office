<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CaseFileController;
use App\Http\Controllers\CaseListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DutyReportController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NotificationController;




// Dashboard route (requires login)
Route::get('/', [DashboardController::class, 'dashboard'])
    ->middleware('auth')
    ->name('pages.dashboard');

//Notification Section
// Route::get('/mark-notifications-as-read', function () {
//     Auth::user()->unreadNotifications->markAsRead();
//     return redirect()->back();
// })->name('markNotificationsAsRead');

Route::post('/notification/{id}/read', [NotificationController::class, 'markAsRead'])->name('notification.read');
Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');


//Permission
Route::group(['middleware' => ['role:super-admin|director|deputy-director|officer|staff']], function () {

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

    //Duty Report
    Route::get('/dutyreport', [DutyReportController::class, 'index'])->name('pages.dutyreport.index');
    Route::get('/dutyreport/create', [DutyReportController::class, 'create'])->name('pages.dutyreport.create');
    Route::get('/dutyreport/{id}', [DutyReportController::class, 'show'])->name('pages.dutyreport.show');
    Route::get('/dutyreport/{id}/edit', [DutyReportController::class, 'edit'])->name('pages.dutyreport.edit');
    Route::put('/dutyreport/{id}/update', [DutyReportController::class, 'update'])->name('pages.dutyreport.update');


    Route::delete('/dutyreport/{id}', [DutyReportController::class, 'destroy'])->name('pages.dutyreport.destroy');

});



//Input Data By User Role
Route::middleware(['auth'])->post('/duty-report', [DutyReportController::class, 'store'])->name('duty-report.store');

Route::middleware(['role:staff'])->group(function () {
    Route::post('/duty-report/store-staff', [DutyReportController::class, 'storeStaff'])->name('duty-report.storeStaff');
});



Route::middleware(['role:officer|super-admin'])->group(function () {
    Route::get('/temporary-duty-report/{id}/edit-transfer', [DutyReportController::class, 'editTransfer'])
        ->name('temporary-duty-report.editTransfer');

    Route::put('/temporary-duty-report/{id}/update-transfer', [DutyReportController::class, 'updateTransfer'])
        ->name('temporary-duty-report.updateTransfer');
});

Route::middleware(['role:officer|super-admin'])->group(function () {
    Route::get('/temporary-duty-report/{id}/edi-receiver', [DutyReportController::class, 'editReceiver'])
        ->name('temporary-duty-report.editReceiver');

    Route::put('/temporary-duty-report/{id}/update-receiver', [DutyReportController::class, 'updateReceiver'])
        ->name('temporary-duty-report.updateReceiver');
});



Route::middleware(['role:deputy-director'])->group(function () {
    Route::get('/temporary-duty-report/{id}/editDeputyDirectorApprove', [DutyReportController::class, 'editDeputyDirectorApprove'])
        ->name('temporary-duty-report.editDeputyDirectorApprove');

    Route::put('/temporary-duty-report/{id}/updateDeputyDirectorApprove', [DutyReportController::class, 'updateDeputyDirectorApprove'])
        ->name('temporary-duty-report.updateDeputyDirectorApprove');
});

Route::middleware(['role:director'])->group(function () {
    Route::get('/temporary-duty-report/{id}/editDirectorApprove', [DutyReportController::class, 'editDirectorApprove'])
        ->name('temporary-duty-report.editDirectorApprove');

    Route::put('/temporary-duty-report/{id}/updateDirectorApprove', [DutyReportController::class, 'updateDirectorApprove'])
        ->name('temporary-duty-report.updateDirectorApprove');
});

//Department

Route::middleware(['auth'])->group(function () {
    Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('department.show');

    Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department/{id}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::put('/department/{id}/update', [DepartmentController::class, 'update'])->name('department.update');


    Route::delete('/department/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy');
});


//Case file 

Route::middleware(['auth'])->group(function () {
    Route::get('/caseFile', [CaseFileController::class, 'index'])->name('caseFile.index');

    Route::get('/caseFile/create', [CaseFileController::class, 'create'])->name('caseFile.create');
    Route::post('/caseFile/store', [CaseFileController::class, 'store'])->name('caseFile.store');
    Route::get('/caseFile/{id}', [CaseFileController::class, 'show'])->name('caseFile.show');
    Route::get('/caseFile/{id}/edit', [CaseFileController::class, 'edit'])->name('caseFile.edit');
    Route::put('/caseFile/{id}/update', [CaseFileController::class, 'update'])->name('caseFile.update');


    Route::delete('/caseFile/{id}', [CaseFileController::class, 'destroy'])->name('caseFile.destroy');
});

//Case List

Route::middleware(['auth'])->group(function () {
    Route::get('/caseList', [CaseListController::class, 'index'])->name('caseList.index');

    Route::get('/caseList/create', [CaseListController::class, 'create'])->name('caseList.create');
    Route::post('/caseList/store', [CaseListController::class, 'store'])->name('caseList.store');
    Route::get('/caseList/{id}', [CaseListController::class, 'show'])->name('caseList.show');
    Route::get('/caseList/{id}/edit', [CaseListController::class, 'edit'])->name('caseList.edit');
    // Route::put('/caseList/{id}/update', [CaseListController::class, 'update'])->name('caseList.update');
    Route::match(['PUT', 'POST'], '/caseList/{id}/update', [CaseListController::class, 'update'])->name('caseList.update');


    Route::delete('/caseList/{id}', [CaseListController::class, 'destroy'])->name('caseList.destroy');
});



//Search
Route::get('/case-files/search', [SearchController::class, 'caseFileSearch'])->name('caseFile.search');
Route::get('/department/search', [SearchController::class, 'departmentSearch'])->name('department.search');
Route::get('/case-list/search', [SearchController::class, 'caseListSearch'])->name('caseList.search');


//File Manager
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('elfinder/connector', '\Barryvdh\Elfinder\ElfinderController@showConnector')->name('elfinder.connector');
    Route::get('elfinder/popup/{input_id?}', '\Barryvdh\Elfinder\ElfinderController@showPopup')->name('elfinder.popup');
});


// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
