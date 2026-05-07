<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServicesController extends Controller
{
    public function index(): View
    {
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Creating modern, responsive, and scalable websites using the latest technologies.',
                'icon' => '🌐',
                'details' => ['Custom CMS', 'E-commerce', 'Corporate Sites'],
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'User-centric design focused on creating intuitive and engaging digital experiences.',
                'icon' => '🎨',
                'details' => ['Wireframing', 'Prototyping', 'User Research'],
            ],
            [
                'title' => 'Backend Architecture',
                'description' => 'Designing robust and secure server-side logic and database structures.',
                'icon' => '⚙️',
                'details' => ['API Design', 'Database Optimization', 'Cloud Infrastructure'],
            ],
        ];

        return view('services', compact('services'));
    }
}
