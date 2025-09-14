<?php

declare(strict_types=1);
use Illuminate\Support\Facades\Route;
use Mortezaa97\Sliders\Http\Controllers\SlideController;
use Mortezaa97\Sliders\Http\Controllers\SliderController;
use Mortezaa97\Stories\Http\Controllers\StoryController;

Route::prefix('api/sliders')->group(function () {
    Route::get('/', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('/{slider}', [SliderController::class, 'show'])->name('sliders.show');
});
Route::prefix('api/slides')->group(function () {
    Route::get('/', [SlideController::class, 'index'])->name('slides.index');
    Route::get('/{slide}', [SlideController::class, 'show'])->name('slides.show');
});
