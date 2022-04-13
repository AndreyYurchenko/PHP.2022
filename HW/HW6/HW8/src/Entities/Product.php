<?php

namespace Hillel\Entities;

use Hillel\Casts\ArrayCast;
use Hillel\Casts\MoneyCast;
use Hillel\Casts\DateTimeCast;
use PHPUnit\Util\Exception;

class Product
{
    private float $price;

    private string $attributes;

    private int $updatedAt;

    protected $casts = [
        'price' => MoneyCast::class,
        'attributes' => ArrayCast::class,
        'updatedAt' => DateTimeCast::class,
    ];

    public function __construct($price, $attributes, $updatedAt)
    {
        $this->price = $price;
        $this->attributes = $attributes;
        $this->updatedAt = $updatedAt;
    }

    public function __set($variable, $value)
    {
        if (isset($this->casts[$variable])) {
            $this->$variable = $this->casts[$variable]::set($value);
        } else {
            throw  new Exception('Incorrect set');
        }
    }

    public function __get($variable)
    {
        if (isset($this->casts[$variable])) {
            return $this->casts[$variable]::get($this->$variable);
        } else {
            throw  new Exception('Incorrect get');
        }
    }

    public function __toString(): string
    {
        return "Mon:" . MoneyCast::get($this->price) . "<br>" . "AB:" . implode(' ', ArrayCast::get($this->attributes))
            . "<br>" . "Date:" . DateTimeCast::get($this->updatedAt) . "<br>";
    }
}
