<?php

namespace App\Actions\ExchangeRate;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\ExchangeRate;

class Get
{
    use AsAction;

    private $select = ["code", "value"];

    public function handle($code = "")
    {
        if ($code) return $this->one($code);
        else return $this->all();
    }

    private function one($code) {
        return ExchangeRate::select($this->select)
            ->sortByDesc("date")
            ->where('code', $code)
            ->one();
    }

    private function all() {
        // select date from exchange_rates group by date order by date desc limit 1

        $lastDate = ExchangeRate::select("date")
            ->groupBy("date")
            ->orderByDesc("date")
            ->limit(1)
            ->first()
            ->date;

        return ExchangeRate::select($this->select)
            ->where("date", "=", $lastDate)
            ->get();
    }
}
