<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClass\IndexController as SchoolClassIndexController;
use App\Http\Controllers\SchoolClass\CreateController as SchoolClassCreateController;
use App\Http\Controllers\SchoolClass\StoreController as SchoolClassStoreController;
use App\Http\Controllers\SchoolClass\ShowController as SchoolClassShowController;
use App\Http\Controllers\SchoolClass\EditController as SchoolClassEditController;
use App\Http\Controllers\SchoolClass\UpdateController as SchoolClassUpdateController;
use App\Http\Controllers\SchoolClass\DestroyController as SchoolClassDestroyController;

// Teacher Route
Route::prefix('teachers')->name('teachers.')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/create', [TeacherController::class, 'create'])->name('create');
    Route::post('/', [TeacherController::class, 'store'])->name('store');
    Route::get('/{id}', [TeacherController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');
    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

// Student Route
Route::prefix('students')->name('students.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/', [StudentController::class, 'store'])->name('store');
    Route::get('/{id}', [StudentController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StudentController::class, 'update'])->name('update');
    Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
});

// Class Route
Route::prefix('classes')->name('classes.')->group(function () {
    Route::get('/', SchoolClassIndexController::class)->name('index');
    Route::get('/create', SchoolClassCreateController::class)->name('create');
    Route::post('/', SchoolClassStoreController::class)->name('store');
    Route::get('/{id}', SchoolClassShowController::class)->name('show');
    Route::get('/{id}/edit', SchoolClassEditController::class)->name('edit');
    Route::put('/{id}', SchoolClassUpdateController::class)->name('update');
    Route::delete('/{id}', SchoolClassDestroyController::class)->name('destroy');
});

// Major Route
Route::resource('majors', MajorController::class);