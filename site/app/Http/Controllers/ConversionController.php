<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversionController extends Controller
{
    private function currencyNotFound($code) {
        return [
            'status' => 'error',
            'cause' => "Currency $code not found"
        ];
    }

    private function fileNotFound() {
        return [
            'status' => 'error',
            'cause' => 'Currencies haven\'t been pulled'
        ];
    }

    public function convert($amount, $from, $to) {
        $targetFilePath = base_path() . "/currencies.json";

        if (!file_exists($targetFilePath)) {
            return response()->json($this->fileNotFound());
        }

        $currencies = json_decode(
            file_get_contents($targetFilePath)
        );

        $source = $currencies->{$from} ?? null;

        if (!$source) {
            return response()->json($this->currencyNotFound($from));
        }

        $target = $currencies->{$to} ?? null;

        if (!$target) {
            return response()->json($this->currencyNotFound($to));
        }

        $sourceValue = (float) str_replace(",", ".", $source->value);
        $targetValue = (float) str_replace(",", ".", $target->value);
        $amountValue = (float) str_replace(",", ".", $amount);

        return response()->json([
            'status' => 'success',
            'result' => ($sourceValue / $targetValue) * $amountValue,
        ]);
    }
}
