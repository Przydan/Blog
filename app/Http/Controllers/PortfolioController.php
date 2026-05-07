<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $projects = [
            [
                'title' => 'Personal Blog Engine',
                'description' => 'A high-performance blog engine built with Laravel 13 and Tailwind CSS v4.',
                'technologies' => ['Laravel', 'Tailwind CSS', 'MySQL'],
                'link' => '#',
                'image' => 'https://picsum.photos/400/300?random=1',
            ],
            [
                'title' => 'E-commerce Platform',
                'description' => 'Full-featured online store with payment integration and admin dashboard.',
                'technologies' => ['Laravel', 'Vue.js', 'Stripe'],
                'link' => '#',
                'image' => 'https://picsum.photos/400/300?random=2',
            ],
            [
                'title' => 'Task Management App',
                'description' => 'Collaborative task tracking tool for remote teams.',
                'technologies' => ['React', 'Node.js', 'MongoDB'],
                'link' => '#',
                'image' => 'https://picsum.photos/400/300?random=3',
            ],
        ];

        return view('portfolio', compact('projects'));
    }
}
