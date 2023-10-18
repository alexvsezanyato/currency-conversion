<?php

namespace App\Actions\ExchangeRate;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\ExchangeRate;

class Get
{
    use AsAction;

    public function handle($code = "")
    {
        if ($code) return $this->one($code);
        else return $this->all();
    }

    private function one($code) {
        return ExchangeRate::where('code', $code)->get([
            'code', 'name', 'value'
        ]);
    }

    private function all() {
        return ExchangeRate::get([
            'code', 'name', 'value'
        ]);
    }
}
