<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function start()
    {
        return response(
            'Witaj w mojej aplikacji! To jest strona startowa.',
            200,
            ['Content-Type' => 'text/plain; charset=UTF-8']
        );
    }
}
