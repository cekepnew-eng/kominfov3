<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananPublikController;

Route::get('/', function () {
    return view('layanan.landing-page');
})->name('home');

Route::prefix('layanan-publik')->group(function () {
    Route::get('/penelitian', [LayananPublikController::class, 'penelitian'])->name('layanan.penelitian');
    Route::get('/submit-penelitian', [LayananPublikController::class, 'submitPenelitianView'])->name('layanan.penelitian.submit');
    Route::post('/penelitian', [LayananPublikController::class, 'storePenelitian'])->name('layanan.penelitian.store');
    Route::get('/penelitian/status', [LayananPublikController::class, 'checkPenelitianStatus'])->name('layanan.penelitian.status');
    Route::post('/penelitian/jurnal', [LayananPublikController::class, 'uploadJurnal'])->name('layanan.penelitian.jurnal.upload');
    Route::get('/penelitian/jurnal/status', [LayananPublikController::class, 'checkJurnalStatus'])->name('layanan.penelitian.jurnal.status');

    Route::get('/magang', [LayananPublikController::class, 'magangView'])->name('layanan.magang');
    Route::post('/magang', [LayananPublikController::class, 'storeMagang'])->name('layanan.magang.store');
    Route::get('/magang/status', [LayananPublikController::class, 'checkMagangStatus'])->name('layanan.magang.status');

    Route::get('/daftar-jurnal', [LayananPublikController::class, 'daftarJurnalView'])->name('layanan.jurnal');

    // Route untuk Verifikasi PDF
    Route::get('/tanda-tangan', function () {
        return view('layanan.tanda-tangan');
    })->name('layanan.tanda-tangan');
    Route::post('/tanda-tangan/verify', [LayananPublikController::class, 'verifyTandaTangan'])->name('layanan.tanda-tangan.verify');

    // Route untuk Survei Kepuasan Masyarakat
    Route::get('/survei', [LayananPublikController::class, 'surveiView'])->name('layanan.survei');
    Route::post('/survei', [LayananPublikController::class, 'storeSurvei'])->name('layanan.survei.store');
});
