<?php

namespace App\Entity;

class Product
{
    protected int $id;
    protected string $currency;
    protected string $productName;
    protected float $cost;

    public function __construct(int $id,  string $productName, float $cost, string $currency)
    {
        $this->id = $id;
        $this->currency = $currency;
        $this->productName = $productName;
        $this->cost = $cost;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}
