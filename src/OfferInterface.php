<?php

namespace Supermarket;

interface OfferInterface
{
    /**
     * @param float $unitPrice
     * @param float $quantity
     * @return float
     */
    public function getDiscount(float $unitPrice, float $quantity);
}