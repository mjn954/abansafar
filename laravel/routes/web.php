<?php

use App\Http\Controllers\AdminControllerController;
use App\Http\Controllers\appController;
use App\Http\Controllers\CallusController;
use App\Http\Controllers\InsidetorsController;
use App\Http\Controllers\InssideholytorsController;
use App\Http\Controllers\OutlineController;
use App\Http\Controllers\OutsideholytorsController;
use App\Http\Controllers\TypetorsController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'insidetors'], function () {
    Route::get('/',[InsidetorsController::class,'index'])->name('index.insidetors');
    Route::get('/create',[InsidetorsController::class,'create'])->name('create.insidetors');
    Route::post('/store', [InsidetorsController::class, 'store'])->name('store.insidetors');
    Route::get('/edit/{insidetor}', [InsidetorsController::class, 'edit'])->name('edit.insidetors');
    Route::put('/update/{insidetor}', [InsidetorsController::class, 'update'])->name('update.insidetors');
    Route::delete('/delete/{insidetor}', [InsidetorsController::class, 'destroy'])->name('delete.insidetors');
});

Route::group(['prefix' => 'Outlinetors'], function () {
    Route::get('/',[OutlineController::class,'index'])->name('Outlinetors.index');
    Route::get('/create', [OutlineController::class, 'create'])->name('Outlinetors.create');
    Route::post('/store', [OutlineController::class, 'store'])->name('Outlinetors.store');
    Route::get('/edit/{outline}', [OutlineController::class, 'edit'])->name('Outlinetors.edit');
    Route::put('/update/{outline}', [OutlineController::class, 'update'])->name('Outlinetors.update');
    Route::delete('/delete/{outline}', [OutlineController::class, 'destroy'])->name('Outlinetors.destroy');



});


Route::group(['prefix' => 'Inssideholytors'], function () {
    Route::get('/', [InssideholytorsController::class, 'index'])->name('index.inssideholytors');
    Route::get('/create', [InssideholytorsController::class, 'create'])->name('inssideholytors.create');
    Route::post('/store', [InssideholytorsController::class, 'store'])->name('inssideholytors.store');
    Route::get('/edit/{inssideholytors}', [InssideholytorsController::class, 'edit'])->name('inssideholytors.edit');
    Route::put('/update/{inssideholytors}', [InssideholytorsController::class, 'update'])->name('inssideholytors.update');
    Route::delete('/delete/{inssideholytors}', [InssideholytorsController::class, 'destroy'])->name('inssideholytors.destroy');
});

Route::group(['prefix' => 'outsideholytors'], function () {
    Route::get('/', [OutsideholytorsController::class, 'index'])->name('outsideholytors.index');
    Route::get('/create', [OutsideholytorsController::class, 'create'])->name('outsideholytors.create');
    Route::post('/store', [OutsideholytorsController::class, 'store'])->name('outsideholytors.store');
    Route::get('/edit/{outsideholytor}', [OutsideholytorsController::class, 'edit'])->name('outsideholytors.edit');
    Route::put('/update/{outsideholytor}', [OutsideholytorsController::class, 'update'])->name('outsideholytors.update');
    Route::delete('/delete/{outsideholytor}', [OutsideholytorsController::class, 'destroy'])->name('outsideholytors.destroy');
});


Route::group(['prefix' => 'Admin'], function () {
    Route::get('/', [AdminControllerController::class, 'index'])->name('admin.login.form');
    Route::post('/login', [AdminControllerController::class, 'validateLogin'])->name('admin.login');
    Route::get('/ds', [TypetorsController::class,"index"])->name('home');

    // لیست پیام‌های تماس
    Route::get('/contact-us', [CallusController::class, 'index'])->name('callus.index'); // اینجا تغییر دادیم

    // نمایش یک پیام
    Route::get('/callus/{id}', [CallusController::class, 'show'])->name('callus.show');

    // حذف پیام
    Route::delete('/callus/{id}', [CallusController::class, 'destroy'])->name('callus.destroy');

});

//===================================================================================================
//از اینجا به بعد مربوط به viewسایت میشه

use App\Http\Controllers\DomesticPilgrimageTourController;
use App\Http\Controllers\DomesticToursController;
use App\Http\Controllers\InternationalTourController;
use App\Http\Controllers\InternationalPilgrimageTourController;





use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home.page');
Route::post('/', [CallusController::class, 'store'])->name('callus.link');

//🕌 تور زیارتی داخلی
Route::group(['prefix' => 'Domesticpilgrimagetour'], function () {
    Route::get('/',[DomesticPilgrimageTourController::class,'index'])->name('Domesticpilgrimagetour.index');
    Route::get('/{Domesticpilgrimagetour}', [DomesticPilgrimageTourController::class, 'show'])->name('Domesticpilgrimagetour.show');
});


//تور خارجی
Route::group(['prefix' => 'InternationalTour'], function () {
    Route::get('/', [InternationalTourController::class, 'index'])->name('InternationalTour.index');
    Route::get('/{outline}', [InternationalTourController::class, 'show'])->name('InternationalTour.show');
});




//تور زیارتی خارجی
Route::group(['prefix' => 'InternationalPilgrimageTour'], function () {
    Route::get('/', [InternationalPilgrimageTourController::class, 'index'])->name('InternationalPilgrimageTour.index');
    Route::get('/{InternationalPilgrimageTour}', [InternationalPilgrimageTourController::class, 'show'])->name('InternationalPilgrimageTour.show');
});

//تورهای داخلی
Route::group(['prefix' => 'DomesticTours'], function () {
    Route::get('/', [DomesticToursController::class, 'index'])->name('DomesticTours.index');
    Route::get('/{Domesticpilgrimagetour}', [DomesticToursController::class, 'show'])->name('DomesticTours.show');
});

Route::group(['prefix' => 'app'], function () {
    Route::get('/whatsapp', [appController::class, 'whatsapp'])->name('whatsapp.link');
    Route::get('/telegram', [appController::class, 'telegram'])->name('telegram.link');
    Route::get('/instagram', [appController::class, 'instagram'])->name('instagram.link');
});





