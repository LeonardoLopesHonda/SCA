<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\AHPController;
use App\Http\Controllers\NodesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\NumericalReportController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

// Login routes
Auth::routes();
Route::get('/auth/github/redirect', [AuthController::class, 'githubredirect'])->name('githublogin');
Route::get('/auth/github/callback', [AuthController::class, 'githubcallback']);
Route::get('/auth/google/redirect', [AuthController::class, 'googleredirect'])->name('googlelogin');
Route::get('/auth/google/callback', [AuthController::class, 'googlecallback']);

// SCA routes
Route::get('/home', [ProjectController::class, 'index'])->name('project.index');
Route::get('/formCreateProject', [ProjectController::class, 'formCreateProject'])->name('project.formCreateProject');
Route::post('/project', [ProjectController::class, 'createProject'])->name('project.createProject');
Route::delete('/project/{id}/remove', [ProjectController::class, 'deleteProject'])->name('project.remove');

// Route::get('/AHP', [AHPController::class, 'AHP']);

// AHP routes
Route::get('/nodes', [NodesController::class, 'index']);
Route::get('/nodes/{id}/criteria', [NodesController::class, 'criteria']);
Route::get('/nodes/{id}/alternatives', [NodesController::class, 'alternatives']);
Route::get('/comparisons/{up}/{id}', [NodesController::class, 'comparisons']);
Route::post('/UpdateScore/{proxy}', [NodesController::class, 'UpdateScore']);
Route::get('/nodes/{id}/report', [ReportController::class, 'report']);
Route::get('/nodes/{id}/NumericalReport', [NumericalReportController::class, 'report']);