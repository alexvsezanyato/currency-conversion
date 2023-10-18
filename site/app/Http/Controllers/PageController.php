<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

class PageController extends Controller
{
    public function index() {
        return Inertia::render('Main');
    }

    public function conversion() {
        return Inertia::render('Conversion');
    }
}
