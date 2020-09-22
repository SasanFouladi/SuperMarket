<?php


namespace Supermarket;


class Catalog
{
    /**
     * @var array
     */
    private $itemsPrices;


    /**
     * Catalog constructor.
     * @param array $itemsPrices
     */
    public function __construct(array $itemsPrices)
    {
        $this->itemsPrices = $itemsPrices;
    }

    public function getUnitPrice(string $sku): float
    {
        return ($this->itemsPrices[$sku] ?? 0 );
    }

}