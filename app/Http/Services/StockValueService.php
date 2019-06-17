<?php

namespace App\Http\Services;

use Illuminate\Support\Collection;
use Ixudra\Curl\CurlService;
use Ixudra\Curl\Facades\Curl;

class StockValueService
{
    /**
     * @var Curl
     */
    private $curl;

    public function __construct(CurlService $curl)
    {
        $this->curl = $curl;
    }

    public function getValues(string $stockName, string $period = '1W'): Collection
    {
        return collect(
            json_decode(
                $this
                    ->curl
                    ->to("http://portal-widgets-v3.foreks.com/periodic-tabs/data")
                    ->withData([
                        'id'=>'graph1',
                        'code' => "{$stockName}.E.BIST",
                        'period' => "{$period}",
                        'intraday' => 60,
                        'delay' => 15,
                        'linecolor' => '#ffd355'
                    ])
                    ->post(),
                true
            )["data"]
        );
    }

    public function calculatePercentage(Collection $collection)
    {
        return $collection->map(
            function ($item, $index) use ($collection) {
                return $index === 0
                    ? 0
                    : ($item[1] - $collection->get($index - 1)[1]) / $collection->get($index - 1)[1] * 100
                ;
            }
        )->avg();
    }
}