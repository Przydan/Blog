<?php

use Illuminate\Support\Facades\Route;

Route::get('/car/{marka?}/{model?}/{kolor?}/{cena?}', function (?string $marka = null, ?string $model = null, ?string $kolor = null, ?string $cena = null) {
    $rules = [
        'marka' => '/^[A-Za-z0-9-]+$/',
        'model' => '/^[A-Za-z0-9-]+$/',
        'kolor' => '/^[A-Za-z-]+$/',
        'cena' => '/^[0-9]+$/',
    ];

    foreach (['marka', 'model', 'kolor', 'cena'] as $field) {
        $value = $$field;
        if ($value !== null && !preg_match($rules[$field], $value)) {
            return response("Nieprawidłowy format parametru {$field}.", 400);
        }
    }

    $marka = $marka ?: 'nie podano';
    $model = $model ?: 'nie podano';
    $kolor = $kolor ?: 'nie podano';
    $cena = $cena ?: 'nie podano';

    return response(
        "Marka: {$marka}, model: {$model}\nKolor: {$kolor}\nCena: {$cena}",
        200,
        ['Content-Type' => 'text/plain; charset=UTF-8']
    );
})->name('car.show');

Route::get('/auto/{marka?}/{model?}/{kolor?}/{cena?}', function (?string $marka = null, ?string $model = null, ?string $kolor = null, ?string $cena = null) {
    $rules = [
        'marka' => '/^[A-Za-z0-9-]+$/',
        'model' => '/^[A-Za-z0-9-]+$/',
        'kolor' => '/^[A-Za-z-]+$/',
        'cena' => '/^[0-9]+$/',
    ];

    foreach (['marka', 'model', 'kolor', 'cena'] as $field) {
        $value = $$field;
        if ($value !== null && !preg_match($rules[$field], $value)) {
            return response("Nieprawidłowy format parametru {$field}.", 400);
        }
    }

    $segments = array_filter([$marka, $model, $kolor, $cena], fn ($value) => $value !== null);
    $path = '/car' . ($segments ? '/' . implode('/', $segments) : '');

    return redirect($path);
});
