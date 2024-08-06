<?php
namespace App;

class DeliveryRules
{
    public static function getRules()
    {
        return [
            ['threshold' => 50, 'charge' => 4.95],
            ['threshold' => 90, 'charge' => 2.95],
            ['threshold' => PHP_INT_MAX, 'charge' => 0]
        ];
    }
}