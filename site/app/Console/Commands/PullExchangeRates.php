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

    protected $dateFormat = "YYYY-MM-DD";

    private function getFromRussianCB() {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", "http://www.cbr.ru/scripts/XML_daily.asp");
        $xml = simplexml_load_string($response->getBody());

        $currencies = [];

        $currencies["RUB"] = [
            "code" => "RUB",
            "name" => "Российский рубль",
            "value" => "1",

            "date" => Carbon::now()->isoFormat($this->dateFormat),
        ];

        foreach ($xml as $currency) {
            $code = (string) $currency->CharCode;
            $value = str_replace(",", ".", (string) $currency->VunitRate);
            $name = (string) $currency->Name;

            $currencies[$code] = [
                "code" => $code,
                "name" => $name,
                "value" => $value,

                "date" => (string) Carbon::now()->isoFormat($this->dateFormat),
            ];
        }

        return $currencies;
    }

    private function getFromThailandCB() {
        $client = new \GuzzleHttp\Client();

        $uri = "https://apigw1.bot.or.th/bot/public/Stat-ExchangeRate/v2/DAILY_AVG_EXG_RATE/";

        $headers = [
            "X-IBM-Client-Id" => "c2bbe063-d0ff-456c-bc08-fbd5115fb340",
        ];

        $dateFormat = "YYYY-MM-DD";

        $date = Carbon::now()->addDays(-1)->isoFormat($dateFormat);

        $query = [
            "start_period" => $date,
            "end_period" => $date,
        ];

        $response = $client->request("GET", $uri, [
            "headers" => $headers,
            "query" => $query,
        ]);

        $responseBody = json_decode($response->getBody());
        $detail = $responseBody->result->data->data_detail;

        foreach ($detail as $currency) {
            $code = $currency->currency_id;
            $value = (float) $currency->mid_rate;
            $name = $currency->currency_name_eng;

            $currencies[$code] = [
                "code" => $code,
                "name" => $name,
                "value" => $value,

                "date" => (string) Carbon::now()->isoFormat($this->dateFormat),
            ];
        }

        $rubleData = $currencies["RUB"] ?? [];
        if (!$rubleData) return [];

        $rubleRate = $rubleData["value"];
        if (!$rubleRate) return [];

        foreach ($currencies as &$currency) {
            $currency["value"] /= $rubleRate;
        }

        unset($currency);
        unset($currencies["RUB"]);

        return $currencies;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currencies = [];

        $currencies += $this->getFromRussianCB();
        $currencies += $this->getFromThailandCB();

        ExchangeRate::upsert($currencies, ['date', 'code'], ['value']);
    }
}
