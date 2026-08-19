<?php

use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/docs', [DocumentationController::class, 'swagger'])->name('docs.swagger');
Route::get('/docs/openapi.yaml', [DocumentationController::class, 'openApiSpecification'])->name('docs.openapi');
