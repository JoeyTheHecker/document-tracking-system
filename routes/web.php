<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

// Route::resource('document', DocumentController::class);
Route::get('document/all', [DocumentController::class, 'create'])->name('document.create');
// Route::get('document/create/{acronym}', [DocumentController::class, 'create'])->name('document.create');
Route::post('document', [DocumentController::class, 'store'])->name('document.store');
Route::get('document/received', [DocumentController::class, 'received'])->name('document.received');
Route::get('document/incoming', [DocumentController::class, 'incoming'])->name('document.incoming');
Route::get('document/rejected', [DocumentController::class, 'rejected'])->name('document.rejected');
Route::get('document/outgoing', [DocumentController::class, 'outgoing'])->name('document.outgoing');
Route::get('document/received/history', [DocumentController::class, 'receivedHistory'])->name('document.receivedHistory');
Route::get('document/tracked', [DocumentController::class, 'tracked'])->name('document.tracked');
Route::get('document/pdf/{id}', [DocumentController::class, 'createPDF'])->name('document.pdf_view');

Route::get('document/search',[DocumentController::class, 'find'])->name('web.find');
Route::get('search',[DocumentController::class, 'find2'])->name('web.find2');
Route::get('dts',[DocumentController::class, 'dts'])->name('dts');

Route::patch('document/update/{id}', [DocumentController::class, 'update'])->name('document.update');
Route::patch('document/update-edit/{id}', [DocumentController::class, 'updateEdit'])->name('document.updateEdit');
