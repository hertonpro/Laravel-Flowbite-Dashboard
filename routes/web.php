<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
});

Route::middleware(['auth'])->group(function () {
    // Routes du tableau de bord
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Routes pour la gestion des utilisateurs (admin seulement)
    Route::middleware(['role:admin|super-admin'])->prefix('users')->group(function () {
        Route::get('/', function () {
            return view('users.index');
        })->name('users.index');
    });

    // Routes pour les projets
    Route::middleware(['permission:view projects'])->prefix('projects')->group(function () {
        Route::get('/', function () {
            return view('projects.index');
        })->name('projects.index');

        Route::middleware(['permission:create projects'])->group(function () {
            Route::get('/create', function () {
                return view('projects.create');
            })->name('projects.create');
        });
    });

    // Routes pour les rapports
    Route::middleware(['permission:view reports'])->prefix('reports')->group(function () {
        Route::get('/', function () {
            return view('reports.index');
        })->name('reports.index');
    });

    // Routes pour les paramètres
    Route::middleware(['permission:view settings'])->prefix('settings')->group(function () {
        Route::get('/', function () {
            return view('settings.index');
        })->name('settings.index');
    });
});

require __DIR__ . '/auth.php';
