<?php


namespace Supermarket;


class Teller
{
    private $items = [];
    private $catalog;
    private $offers;

    /**
     * Checkout constructor.
     * @param Catalog $catalog
     * @param array $offers
     */
    public function __construct(Catalog $catalog, array $offers)
    {
        $this->catalog = $catalog;
        $this->offers = $offers;
    }

    public function getTotal()
    {
        $total = 0.0;
        foreach ($this->items as $sku => $quantity) {
            $total += $this->catalog->getUnitPrice($sku) * $quantity;

            if ($this->hasOffer($sku)){
                $total += $this->offers[$sku]->getDiscount($this->catalog->getUnitPrice($sku), $quantity);
            }
        }
        return $total;
    }

    public function scan(string $sku)
    {
        if (!isset($this->items[$sku])){
            $this->items[$sku] = 0;
        }
        $this->items[$sku]++;
    }

    /**
     * @param string $sku
     * @return bool
     */
    private function hasOffer(string $sku)
    {
        return isset($this->offers[$sku]);
    }

}