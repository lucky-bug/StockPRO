<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class Company
 * @package App
 * @property int $id
 * @property string $name
 * @property float $money
 * @property int $maxStockNumber
 * @property int $dailyExchangeAmount
 * @property int $analysisDays
 * @property Collection $ownedStocks
 */
class Company extends Model
{
    protected $fillable = [
        'name',
        'money',
        'maxStockNumber',
        'dailyExchangeAmount',
        'analysisDays'
    ];

    public function ownedStocks(): HasMany
    {
        return $this->hasMany(OwnedStock::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Company
     */
    public function setId(int $id): Company
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Company
     */
    public function setName(string $name): Company
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float $money
     * @return Company
     */
    public function setMoney(float $money): Company
    {
        $this->money = $money;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxStockNumber(): int
    {
        return $this->maxStockNumber;
    }

    /**
     * @param int $maxStockNumber
     * @return Company
     */
    public function setMaxStockNumber(int $maxStockNumber): Company
    {
        $this->maxStockNumber = $maxStockNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getDailyExchangeAmount(): int
    {
        return $this->dailyExchangeAmount;
    }

    /**
     * @param int $dailyExchangeAmount
     * @return Company
     */
    public function setDailyExchangeAmount(int $dailyExchangeAmount): Company
    {
        $this->dailyExchangeAmount = $dailyExchangeAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnalysisDays(): int
    {
        return $this->analysisDays;
    }

    /**
     * @param int $analysisDays
     * @return Company
     */
    public function setAnalysisDays(int $analysisDays): Company
    {
        $this->analysisDays = $analysisDays;
        return $this;
    }
}
