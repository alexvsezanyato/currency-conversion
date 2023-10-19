<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\ExchangeRate;

class InitExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $dateFormat = "YYYY-MM-DD";

    private function getRatesFor($date) {
        $client = new \GuzzleHttp\Client();

        $uri = "https://apigw1.bot.or.th/bot/public/Stat-ExchangeRate/v2/DAILY_AVG_EXG_RATE/";

        $headers = [
            "X-IBM-Client-Id" => "c2bbe063-d0ff-456c-bc08-fbd5115fb340",
        ];

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

                "date" => $date,
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

        return $currencies;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dateCount = 0;

        for ($i = 0 + 1; true; $i++) {
            $date = Carbon::now()->addDays(-$i)->isoFormat("YYYY-MM-DD");
            $currencies = $this->getRatesFor($date);
            if ($currencies) $dateCount++;

            if ($dateCount > 10 + 1) break;
            if ($i > 30) break;

            ExchangeRate::upsert($currencies, ['date', 'code'], ['value']);
        }
    }
}
