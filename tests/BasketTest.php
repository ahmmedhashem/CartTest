<?php
namespace Tests;
use PHPUnit\Framework\TestCase;
use App\Basket;
use App\Catalog;
use App\DeliveryRules;
use App\Offer;

class BasketTest extends TestCase
{
    public function testTotal()
    {
        $products = Catalog::getProducts();
        $deliveryRules = DeliveryRules::getRules();
        $offers = [new Offer('R01', 0.5)];

        $basket = new Basket($products, $deliveryRules, $offers);

        $basket->add('B01');
        $basket->add('G01');
        $total = $basket->total();
        $this->assertEquals(37.85, round($total, 2));

        $basket = new Basket($products, $deliveryRules, $offers);
        $basket->add('R01');
        $basket->add('R01');
        $total = $basket->total();
        $this->assertEquals(54.37, round($total, 2,PHP_ROUND_HALF_DOWN));

        $basket = new Basket($products, $deliveryRules, $offers);
        $basket->add('R01');
        $basket->add('G01');
        $total = $basket->total();
        $this->assertEquals(60.85, round($total, 2));

        $basket = new Basket($products, $deliveryRules, $offers);
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        $total = $basket->total();
        $this->assertEquals(98.27, round($total, 2,PHP_ROUND_HALF_DOWN));
    }
}
