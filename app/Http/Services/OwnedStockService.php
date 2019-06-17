<?php

namespace App\Http\Services;

use App\OwnedStock;
use App\Stock;

class OwnedStockService
{
    /**
     * @var OwnedStock
     */
    private $ownedStock;

    public function __construct(
        OwnedStock $ownedStock
    ) {
        $this->ownedStock = $ownedStock;
    }

    public function sellStocks(Stock $stock, int $amount, float $cost)
    {
        /**
         * @var OwnedStock $theStock
         */
        $theStock = $this->ownedStock->where('stock_id', $stock->getId())->get();
        $theStock->setQuantity($theStock->getQuantity() - $amount);

    }
}