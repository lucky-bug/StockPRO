<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OwnedStock
 * @package App
 * @property int $id
 * @property int $stock_id
 * @property int $company_id
 * @property int $quantity
 */
class OwnedStock extends Model
{
    protected $fillable = [
        'stock_id',
        'company_id',
        'quantity'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return OwnedStock
     */
    public function setId(int $id): OwnedStock
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getStockId(): int
    {
        return $this->stock_id;
    }

    /**
     * @param int $stock_id
     * @return OwnedStock
     */
    public function setStockId(int $stock_id): OwnedStock
    {
        $this->stock_id = $stock_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->company_id;
    }

    /**
     * @param int $company_id
     * @return OwnedStock
     */
    public function setCompanyId(int $company_id): OwnedStock
    {
        $this->company_id = $company_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return OwnedStock
     */
    public function setQuantity(int $quantity): OwnedStock
    {
        $this->quantity = $quantity;
        return $this;
    }
}
