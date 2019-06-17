<?php

namespace App\Http\Services;

use App\Company;
use App\OwnedStock;
use App\Stock;

class CompanyService
{

    /**
     * @param Company $company
     * @param Stock $stock
     * @param int $quantity
     * @param float $cost
     * @return bool
     */
    public function buyStock(Company $company, Stock $stock, int $quantity, float $cost): bool
    {
        if ($cost * $quantity > $company->getMoney()) {
            return false;
        }

        /**
         * @var OwnedStock $ownedStock
         */
        $ownedStock = $company->ownedStocks()->where('stock_id', $stock->getId())->first();

        if (!$ownedStock && $company->ownedStocks()->count() === $company->getMaxStockNumber()) {
            return false;
        }

        if ($ownedStock) {
            $ownedStock->setQuantity($ownedStock->getQuantity() + $quantity);
        } else {
            $ownedStock = new OwnedStock([
                'stock_id' => $stock->getId(),
                'company_id' => $company->getId(),
                'quantity' => $quantity,
            ]);
        }

        $ownedStock->save();
        $company->setMoney($company->getMoney() - ($quantity * $cost))->save();

        return true;
    }

    public function sellStock(Company $company, Stock $stock, int $quantity, float $cost): bool
    {
        /**
         * @var OwnedStock $ownedStock
         */
        $ownedStock = $company->ownedStocks()->where('stock_id', $stock->getId())->first();

        if (!$ownedStock || $ownedStock->getQuantity() < $quantity) {
            return false;
        }

        $ownedStock->setQuantity($ownedStock->getQuantity() - $quantity);

        if ($ownedStock->getQuantity() === 0) {
            $ownedStock->forceDelete();
        } else {
            $ownedStock->save();
        }

        $company->setMoney($company->getMoney() + ($quantity * $cost));

        return true;
    }
}