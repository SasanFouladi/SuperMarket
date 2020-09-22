<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Supermarket\Catalog;
use Supermarket\Teller;
use Supermarket\OfferPercent;
use Supermarket\OfferXForY;

class SupermarketTest extends TestCase
{


    /**
     * @param string $items
     * @param float $total
     * @dataProvider totalTestCases
     */
    public function testTotal(string $items, float $total)
    {
        // Arrange
        $checkout = new Teller(
            new Catalog(array(
                'A'=>50,
                'B'=>30,
                'C'=>20,
                'D'=>15
            )),
            array(
                'A'=> new OfferXForY(3, 130),
                'B'=> new OfferXForY(2, 45),
                'C'=> new OfferPercent(50),
            )
        );

        // Act
        foreach (str_split($items) as $item) {
            $checkout->scan($item);
        }

        // Assert
        self::assertEquals($total, $checkout->getTotal());
    }

    /**
     * @return array[]
     */
    public function totalTestCases()
    {
        return[
            "no items" => ['', 0],
            "A" => ['A', 50],
            "ABCD" => ['ABCD', 105],
            "AA" => ['AA', 100],
            "AAA" => ['AAA', 130],
            "AAAA" => ['AAAA', 180],
            "AAAAAA" => ['AAAAAA', 260],
            "AABB" => ['AABB', 145],
            "AAABB" => ['AAABB', 175],
            "ABABA" => ['ABABA', 175],
        ];
    }

//
//    public function testReturnZeroWhenNoItemsScanned()
//    {
//        // Arrange
//        $checkout = new Checkout();
//
//        // Act
//
//        // Assert
//        self::assertEquals(0, $checkout->getTotal());
//    }
//
//    public function testReturn50WhenScannedA()
//    {
//        // Arrange
//        $checkout = new Checkout();
//
//        // Act
//
//        $checkout->scan('A');
//
//        // Assert
//        self::assertEquals(50, $checkout->getTotal());
//    }
//
//    public function testReturn115WhenScannedABCD()
//    {
//        // Arrange
//        $checkout = new Checkout();
//
//        // Act
//        foreach (str_split('ABCD') as $sku) {
//            $checkout->scan($sku);
//        }
//
//        // Assert
//        self::assertEquals(115, $checkout->getTotal());
//    }




}