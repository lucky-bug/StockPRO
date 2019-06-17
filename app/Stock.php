<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 * @package App
 * @property int $id
 * @property string $code
 * @property string $name
 */
class Stock extends Model
{
    protected $fillable = [
        'code',
        'name',
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
     * @return Stock
     */
    public function setId(int $id): Stock
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Stock
     */
    public function setCode(string $code): Stock
    {
        $this->code = $code;
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
     * @return Stock
     */
    public function setName(string $name): Stock
    {
        $this->name = $name;
        return $this;
    }
}
