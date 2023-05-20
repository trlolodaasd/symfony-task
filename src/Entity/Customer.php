<?php

namespace App\Entity;

class Customer
{
    protected string $taxNumber;

    public function __construct(string $taxNumber)
    {
        $this->taxNumber = $taxNumber;
    }

    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }
}