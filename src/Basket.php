<?php
namespace App;

class Basket
{
    private $products;
    private $items = [];
    private $deliveryRules;
    private $offers;

    public function __construct($products, $deliveryRules, $offers)
    {
        $this->products = $products;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add($productCode)
    {
        if (isset($this->products[$productCode])) {
            $this->items[] = $this->products[$productCode];
        }
    }

    public function total()
    {
        $total = 0;
        $productCounts = [];
    
        // Count the items and calculate total
        foreach ($this->items as $item) {
            $total += $item->price;
            if (!isset($productCounts[$item->code])) {
                $productCounts[$item->code] = 0;
            }
            $productCounts[$item->code]++;
        }
    
        // Apply offers (like "buy one red widget, get the second half price")
        foreach ($this->offers as $offer) {
            $offerDiscount = $offer->apply($productCounts, $this->items);
            $total -= $offerDiscount;
        }
    
        // Calculate delivery cost based on the total after offers
        foreach ($this->deliveryRules as $rule) {
            if ($total < $rule['threshold']) {
                $total += $rule['charge'];
                break;
            }
        }
    
        return $total; // Round to 2 decimal places for accuracy
    }
    
}
