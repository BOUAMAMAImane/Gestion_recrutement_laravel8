<?php
use App\Http\Controllers\OffreController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/candidate/dashboard', [App\Http\Controllers\CandidateController::class, 'dashboard'])->name('candidatedashboard');
    Route::get('/recruiter/dashboard', [App\Http\Controllers\RecruiterController::class, 'dashboard'])->name('recruiterdashboard');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add-paragraph', [App\Http\Controllers\ParagraphController::class, 'create'])->middleware(['auth']);
Route::post('/paragraphs', [App\Http\Controllers\ParagraphController::class, 'store'])->name('paragraphs.store')->middleware(['auth']);
Route::middleware(['auth'])->group(function () {
    Route::get('/paragraph', [App\Http\Controllers\ParagraphController::class, 'index'])->name('paragraphes.index');
   
    Route::delete('/paragraph/{paragraph}', [App\Http\Controllers\ParagraphController::class, 'destroy'])->name('paragraphes.destroy');
    
    Route::get('/pdf/create', [App\Http\Controllers\PdfController::class, 'create'])->name('pdf.create');
    Route::post('/pdf', [App\Http\Controllers\PdfController::class, 'store'])->name('pdf.store');
    Route::get('/pdf', [App\Http\Controllers\PdfController::class, 'index']);
    Route::get('/pdfs/{id}', [App\Http\Controllers\PdfController::class, 'show'])->name('pdfs.show');
    
    Route::delete('/pdfs/{id}', [App\Http\Controllers\PdfController::class, 'destroy'])->name('pdfs.destroy');
    Route::get('/pdfs/{pdf}/edit',[App\Http\Controllers\PdfController::class, 'edit'])->name('pdfs.edit');
    Route::put('/pdfs/{pdf}', [App\Http\Controllers\PdfController::class, 'update'])->name('pdfs.update');
    Route::get('/paragraphs/{paragraph}/edit', [App\Http\Controllers\ParagraphController::class, 'edit'])->name('paragraphs.edit');
    Route::put('/paragraphs/{paragraph}',[App\Http\Controllers\ParagraphController::class, 'update'] )->name('paragraphs.update');
});
//Route::get('/offre', [App\Http\Controllers\OffreController::class, 'index'])->name('offres.index');

//Route::post('/offres', [App\Http\Controllers\OffreController::class, 'store'])->name('offres.store')->middleware('auth');

//use App\Http\Controllers\OffreController;

Route::middleware(['auth'])->group(function () {
    Route::get('/offres/creer', [App\Http\Controllers\OffreController::class, 'index'])->name('offres.index');
    Route::post('/offres/enregistrer', [App\Http\Controllers\OffreController::class, 'store'])->name('offres.store');
});
Route::get('/recruiterdashboard', [App\Http\Controllers\OffreController::class, 'index'])->name('recruiterdashboard');
Route::delete('/offre/{id}', [App\Http\Controllers\OffreController::class, 'destroy'])->name('offre.destroy');
Route::put('/offres/{offre}', [App\Http\Controllers\OffreController::class, 'update'])->name('offre.update');
Route::get('/offres/{offre}/edit', [App\Http\Controllers\OffreController::class, 'edit'])->name('offre.edit');
Route::get('/offres/carrer', [App\Http\Controllers\OffreController::class, 'show'])->name('offre.show');
Route::get('/offres/carre', [App\Http\Controllers\OffreController::class, 'showauth'])->name('offre.showauth');

Route::middleware('auth')->post('/offres/{offre}/postuler', [App\Http\Controllers\OffreController::class, 'postuler'])->name('offres.postuler');
Route::get('/offres/{offre}/showauth', [App\Http\Controllers\OffreController::class, 'showCandidatures'])->name('offres.showauth');
Route::get('/pdfs/{id}',[App\Http\Controllers\PdfController::class, 'show'])->name('pdf.show');
