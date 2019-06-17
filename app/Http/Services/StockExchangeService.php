<?php

namespace App\Http\Services;

use App\Company;
use App\Stock;
use Illuminate\Support\Collection;

class StockExchangeService
{
    /**
     * @var StockValueService
     */
    private $stockValueService;

    public function __construct(
        StockValueService $stockValueService
    ) {
        $this->stockValueService = $stockValueService;
    }

    public function exchangeStock(Company $company, Collection $allStocks)
    {
        $allStocks
            ->map(function (Stock $stock) {
                return [
                    'stock_id' => $stock->id,
                    'value' => $this
                        ->stockValueService
                        ->calculatePercentage(
                            $this->stockValueService->getValues($stock->code)
                        )
                ];
            })
            ->sortByDesc('value')
            ->take(3)
            ->each(function ($item) use($company) {
                $ownedStock = $company->ownedStocks()->where('stock_id', $item['stock_id'])->first();

                // If don't own stock then sell one with max profit and buy new stock
            })
        ;
    }
}