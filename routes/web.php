<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskLogController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PerformanceReportController;
use App\Http\Controllers\ReportsController;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin-dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/scheduler-dashboard', [HomeController::class, 'adminScheduler'])->name('admin.scheduler');
    Route::get('/cleaner-dashboard', [HomeController::class, 'adminCleaner'])->name('admin.cleaner');
    Route::get('/client-dashboard', [HomeController::class, 'adminClient'])->name('admin.client');
    Route::get('/tasks/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.mytasks');
    
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('task_logs', TaskLogController::class);
    Route::resource('schedules', ScheduleController::class)->names([
        'index'   => 'schedules.index',
        'create'  => 'schedules.create',
        'store'   => 'schedules.store',
        'show'    => 'schedules.show',
        'edit'    => 'schedules.edit',
        'update'  => 'schedules.update',
        'destroy' => 'schedules.destroy',
    ]);
    Route::resource('performance_reports', PerformanceReportController::class);

    Route::resource('reports', ReportsController::class);
});
