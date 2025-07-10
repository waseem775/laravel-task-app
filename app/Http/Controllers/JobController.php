<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = [
            ['title' => 'Laravel Developer', 'location' => 'Remote', 'type' => 'Full-time'],
            ['title' => 'Vue.js Frontend Engineer', 'location' => 'New York', 'type' => 'Part-time'],
        ];

        return view('jobs.index', compact('jobs'));
    }
}

