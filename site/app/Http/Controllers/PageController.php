<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

class PageController extends Controller
{
    private function getCurrencies() {
        $currenciesPath = base_path() . "/currencies.json";
        $currencies = [];

        if (!file_exists($currenciesPath)) {
            Artisan::call("rate:pull");
        }

        if (file_exists($currenciesPath)) {
            return json_decode(
                file_get_contents($currenciesPath)
            );
        } else {
            return [];
        }
    }

    public function index() {
        return Inertia::render('Main', [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'title' => "Конвертер валют",
            'currencies' => $this->getCurrencies(),
        ]);
    }

    public function conversion() {
        return Inertia::render('Conversion', [
            'currencies' => $this->getCurrencies(),
        ]);
    }
}
