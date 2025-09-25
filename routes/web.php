<?php

use App\Http\Controllers\ContactMessageController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/events', 'events');
Route::view('/contact', 'contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::get('setup-app', function () {
  $migrated = Artisan::call("migrate --env production");
  $seeded = Artisan::call("db:seed --env production");

  $storage_status = Artisan::call("storage:link");
  $optimization_status = Artisan::call("optimize --env production");
  $app_url = url('/');
  return ($storage_status + $optimization_status + $migrated + $seeded) != 0 ? response(
    str(<<<Markdown
    # Erreur...

    Une erreur est survenue et l'application n'a pas pu configurer les éléments de stockage.

    *Codes de sortie:*
    - Migration: $migrated
    - Seeder: $seeded
    - Storage: $storage_status
    - Optimisations: $optimization_status
    Markdown)->markdown()->toHtmlString(),
    500
  ) : response(
    str(<<<Markdown
    # Configuré !

    Les différents éléments de stockage ont bien été configurés.

    [Revenir au site]($app_url)
    Markdown)->markdown()->toHtmlString()
  );
});
