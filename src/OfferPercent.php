<?php


namespace Supermarket;


class OfferPercent implements OfferInterface
{

    /**
     * @var float
     */
    private $percent;

    public function __construct(float $percent)
    {
        $this->percent = $percent;
    }

    public function getDiscount(float $unitPrice, float $quantity)
    {
        return -1 * $unitPrice * $quantity * ($this->percent/100);
    }
}