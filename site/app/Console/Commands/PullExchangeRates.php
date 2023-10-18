<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ExchangeRate;
use Carbon\Carbon;

class PullExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", "http://www.cbr.ru/scripts/XML_daily.asp");
        $xml = simplexml_load_string($response->getBody());

        $currencies = [];

        $currencies["RUB"] = [
            "code" => "RUB",
            "name" => "Российский рубль",
            "value" => "1",

            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ];

        foreach ($xml as $currency) {
            $code = (string) $currency->CharCode;
            $value = str_replace(",", ".", (string) $currency->VunitRate);
            $name = (string) $currency->Name;

            $currencies[$code] = [
                "code" => $code,
                "name" => $name,
                "value" => $value,

                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ];
        }

        if (false) foreach ($currencies as $currency) {
            ExchangeRate::create($currency);
        }

        ExchangeRate::insert($currencies);
    }
}
