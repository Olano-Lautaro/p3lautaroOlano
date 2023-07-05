<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\UserController;

use App\Models\Student;
use Pest\Plugins\Only;

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

// Welcome
Route::get('/', function () {
    return view('welcome');
});

// Pàgina
Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Ruta Subjects (Materias)
    Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
    
    // Ruta Students (Estudiantes)
    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    
    // Ruta Assist (Asistencias)
    Route::get('assists', [AssistController::class, 'index'])->name('assists.index');
    
    // Ruta Career (Carreras)
    Route::get('careers', [CareerController::class, 'index'])->name('careers.index');
    
    Route::resource('students', StudentController::class); //CRUD Student
    Route::resource('subjects', SubjectController::class); //CRUD Subject
    Route::resource('assists', AssistController::class); //CRUD Assist
    Route::resource('careers', CareerController::class); //CRUD Career
    
    Route::delete('subjects/{subject}/destroyConfig', [SubjectController::class, 'destroyConfig'])->name('subjects.destroyConfig');
});

require __DIR__.'/auth.php';
