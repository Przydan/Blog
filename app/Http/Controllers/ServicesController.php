<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicesController
{
    public function index(Request $request): View
    {
        $services = Service::latest()->get();

        return view('services', compact('services'));
    }
}
