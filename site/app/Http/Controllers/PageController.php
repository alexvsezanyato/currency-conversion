<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

class PageController extends Controller
{
    public function index() {
        $currenciesPath = base_path() . "/currencies.json";

        $currencies = [];

        if (file_exists($currenciesPath)) {
            $currencies = json_decode(
                file_get_contents($currenciesPath)
            );
        }

        return Inertia::render('Main', [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'title' => "Конвертер валют",
            'currencies' => $currencies,
        ]);
    }

    public function conversion() {
        return Inertia::render('Conversion');
    }
}
