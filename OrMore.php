<?php

class OrMore implements DiscountInterface
{
    /**
     * New price after discount
     * @var double
     */
    public $newPrice;

    /**
     * Quantity to check against
     * @var int
     */
    public $quantity;

    /**
     * Ad Object
     * @var Ad
     */
    public $ad;

    /**
     * Constructor
     * @param double $newPrice New Price after discount
     * @param int   $quantity Quantity to check against
     * @param Ad    $ad       Ad Object
     */
    public function __construct($newPrice, $quantity, Ad $ad)
    {
        $this->newPrice = $newPrice;
        $this->quantity = $quantity;
        $this->ad = $ad;
    }

    /**
     * Calculate with discount
     * @param  Array  $orderArray Array of Orders
     * @return double             Total with discount
     */
    public function calculate(Array $orderArray)
    {
        $count = sizeof($orderArray);
        $originalPrice = $this->ad->price;

        if ($count >= $this->quantity) {
            return $this->newPrice * $count;
        }

        return $originalPrice * $count;
    }
}
