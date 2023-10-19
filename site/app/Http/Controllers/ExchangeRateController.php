<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\ExchangeRate;

class ExchangeRateController extends Controller
{
    public function convert($amount, $from, $to) {
        $exchangeRates = ExchangeRate\Convert::run($amount, $from, $to);

        $sourceValue = 1;
        $targetValue = 1;
        $amountValue = (float) $amount;

        return response()->text($amountValue * $sourceValue / $targetValue);
    }

    public function get($code = "") {
        $exchangeRates = ExchangeRate\Get::run();
        return response()->json($exchangeRates);
    }

    public function latest(string $codes, int $count) {
        if ($count > 100) $count = 100;
        $codes = explode("-", $codes);

        $latest = ExchangeRate\Latest::run($codes, $count);

        return response()->json($latest);
    }
}
