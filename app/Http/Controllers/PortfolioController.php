<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController
{
    public function index(Request $request): View
    {
        $projects = PortfolioProject::latest()->get();

        return view('portfolio', compact('projects'));
    }
}
