<?php
namespace App;

class Offer
{
    private $productCode;
    private $discount;

    public function __construct($productCode, $discount)
    {
        $this->productCode = $productCode;
        $this->discount = $discount;
    }

    public function apply(&$productCounts, $items)
    {
        $discount = 0;

        if (isset($productCounts[$this->productCode])) {
            $eligibleCount = intdiv($productCounts[$this->productCode], 2);
            // Find the price for the specific product code
            foreach ($items as $item) {
                if ($item->code === $this->productCode) {
                    $discount += $eligibleCount * ($item->price / 2);
                    break; 
                }
            }
        }

        return $discount;
    }
}
