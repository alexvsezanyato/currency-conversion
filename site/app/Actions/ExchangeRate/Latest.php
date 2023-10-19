<?php

namespace App\Actions\ExchangeRate;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\ExchangeRate;

class Latest
{
    use AsAction;

    public function handle(array $codes, int $count)
    {
        $rates = ExchangeRate::select("code", "value")
            ->orderBy("date")
            ->whereIn("code", $codes)
            ->take($count)
            ->get();

        $result = [];

        foreach ($rates as $rate) {
            $result[$rate->code] = [];
        }

        foreach ($rates as $rate) {
            $result[$rate->code][] = $rate->value;
        }

        return $result;
    }
}
