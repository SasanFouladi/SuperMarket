<?php


namespace Supermarket;


class OfferXForY implements OfferInterface
{
    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $amount;

    /**
     * OfferXForY constructor.
     * @param float $amount
     * @param float $price
     */
    public function __construct(float $amount, float $price)
    {
        $this->amount = $amount;
        $this->price = $price;
    }

    /**
     * @param float $unitPrice
     * @param float $quantity
     * @return float
     */
    public function getDiscount(float $unitPrice, float $quantity)
    {
        $discount = 0.0;
        if ($quantity >= $this->amount) {
            $discount = intval($quantity / $this->amount) * ($this->price - $this->amount * $unitPrice);
        }
        return $discount;
    }

}