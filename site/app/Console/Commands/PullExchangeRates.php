<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $currencyXML = simplexml_load_string(
            file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp")
        );

        $currencyRate = [];

        $currencyRate["RUB"] = [
            "name" => "Российский рубль",
            "value" => "1",
            "code" => "RUB",
        ];

        foreach ($currencyXML as $currency) {
            $charCode = (string) $currency->CharCode;

            $currencyRate[$charCode] = [
                "name" => (string) $currency->Name,
                "value" => (string) $currency->VunitRate,
                "code" => $charCode,
            ];
        }

        $basePath = base_path();

        file_put_contents(
            "$basePath/currencies.json",
            json_encode($currencyRate)
        );
    }
}
