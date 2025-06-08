<?php

use App\Livewire\Form\Add;
use App\Livewire\Form\Read;
use App\Livewire\Form\Edit;
use App\Livewire\Table;
use Illuminate\Support\Facades\Route;

Route::get('/table', Table::class)->name('table');

Route::prefix('form')->group(function () {
    Route::get('/add', Add::class)->name('form.add');
    Route::get('/edit/{id}', Edit::class)->name('form.edit');
    Route::get('/read', Read::class)->name('form.read');
});
