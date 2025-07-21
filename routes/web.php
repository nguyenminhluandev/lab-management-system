<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardRedirectController;

// Laravel Auth
Auth::routes();
Route::get('/', fn () => redirect('/login'));
// Redirect sau login
Route::get('/dashboard', [DashboardRedirectController::class, 'handle'])->middleware('auth')->name('dashboard');

// ================= ADMIN =================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('labs', App\Http\Controllers\Admin\LabController::class);
    Route::resource('subjects', App\Http\Controllers\Admin\SubjectController::class);
    Route::resource('semesters', App\Http\Controllers\Admin\SemesterController::class);

    Route::resource('schedules', App\Http\Controllers\Admin\ScheduleController::class)->except(['show']);
    Route::get('schedules/weekly', [App\Http\Controllers\Admin\ScheduleController::class, 'weeklyView'])
    ->name('schedules.weekly');
    // Admin - xem TKB theo phòng
    Route::get('schedules/room-view', [App\Http\Controllers\Admin\ScheduleController::class, 'viewByRoom'])->name('schedules.byRoom');
    Route::post('schedules/room-view', [App\Http\Controllers\Admin\ScheduleController::class, 'renderRoomSchedule'])->name('schedules.renderRoom');
    // Admin - xem TKB theo giáo viên
    Route::get('schedules/teacher-view', [App\Http\Controllers\Admin\ScheduleController::class, 'viewByTeacher'])->name('schedules.byTeacher');
    Route::post('schedules/teacher-view', [App\Http\Controllers\Admin\ScheduleController::class, 'renderTeacherSchedule'])->name('schedules.renderTeacher');


    Route::resource('computers', App\Http\Controllers\Admin\ComputerController::class);
    Route::get('labs/{lab}/computers', [App\Http\Controllers\Admin\ComputerController::class, 'listByLab'])
    ->name('computers.byLab');

    Route::resource('equipments', App\Http\Controllers\Admin\EquipmentController::class);

    Route::resource('ghosts', App\Http\Controllers\Admin\GhostController::class)->except(['show']);
    // Gán ghost
    Route::get('ghosts/assign', [App\Http\Controllers\Admin\GhostController::class, 'assignForm'])->name('ghosts.assignForm');
    Route::post('ghosts/assign', [App\Http\Controllers\Admin\GhostController::class, 'assign'])->name('ghosts.assign');
    // Danh sách gán ghost
    Route::get('ghosts/assigned-list', [App\Http\Controllers\Admin\GhostController::class, 'assignedList'])->name('ghosts.assignedList');
    // Hủy gán
    Route::delete('ghosts/unassign/{lab}/{ghost}', [App\Http\Controllers\Admin\GhostController::class, 'unassign'])->name('ghosts.unassign');
    // Hủy active
    Route::patch('ghosts/deactivate/{lab}/{ghost}', [App\Http\Controllers\Admin\GhostController::class, 'deactivate'])->name('ghosts.deactivate');
    // Thay thế ghost đang active
    Route::post('ghosts/replace-active', [App\Http\Controllers\Admin\GhostController::class, 'replaceActive'])->name('ghosts.replaceActive');

    Route::resource('lab_ghosts', App\Http\Controllers\Admin\LabGhostController::class);

    Route::get('leave-requests', [App\Http\Controllers\Admin\LeaveRequestController::class, 'index'])->name('leave_requests.index');
    Route::get('leave-requests/{id}', [App\Http\Controllers\Admin\LeaveRequestController::class, 'show'])->name('leave_requests.show');
    Route::post('leave-requests/{id}/approve', [App\Http\Controllers\Admin\LeaveRequestController::class, 'approve'])->name('leave_requests.approve');


    Route::resource('statistics', App\Http\Controllers\Admin\StatisticController::class)->except(['show']);
    Route::get('statistics/teacher', [App\Http\Controllers\Admin\StatisticController::class, 'teacher'])->name('statistics.teacher');
    Route::get('statistics/lab', [App\Http\Controllers\Admin\StatisticController::class, 'lab'])->name('statistics.lab');
    Route::get('statistics/teacher/export', [App\Http\Controllers\Admin\StatisticController::class, 'exportTeacherExcel'])->name('statistics.teacher.export');
    Route::get('statistics/lab/export', [App\Http\Controllers\Admin\StatisticController::class, 'exportLabExcel'])->name('statistics.lab.export');



});

// ================ MANAGER ================
Route::middleware(['auth', 'role:manager'])->prefix('manager')->name('manager.')->group(function () {
    Route::get('/', [App\Http\Controllers\Manager\DashboardController::class, 'index'])->name('dashboard');
    Route::get('repairs', [App\Http\Controllers\Manager\IssueController::class, 'index'])->name('repairs.index');
    Route::get('materials', [App\Http\Controllers\Manager\EquipmentController::class, 'index'])->name('materials.index');
    Route::get('issue-computers', [App\Http\Controllers\Manager\IssueComputerController::class, 'index'])->name('issuecomputers.index');
});

// ================ TEACHER ================
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/', [App\Http\Controllers\Teacher\DashboardController::class, 'index'])->name('dashboard');
    Route::get('schedules', [App\Http\Controllers\Teacher\ScheduleController::class, 'index'])->name('schedules.index');
    Route::resource('issues', App\Http\Controllers\Teacher\IssueController::class)->only(['index', 'create', 'store']);
    Route::get('issue-computers', [App\Http\Controllers\Teacher\IssueComputerController::class, 'index'])->name('issuecomputers.index');
    Route::resource('leaverequests', App\Http\Controllers\Teacher\LeaveRequestController::class)->only(['index', 'create', 'store']);
});
