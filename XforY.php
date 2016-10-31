<?php

class XforY implements DiscountInterface
{
    /**
     * X in the X for Y discount
     * @var int
     */
    public $x;

    /**
     * Y in the X for Y discount
     * @var int
     */
    public $y;

    /**
     * Ad object
     * @var Ad
     */
    public $ad;

    /**
     * Constructor
     * @param int    $x  X in the X for Y discount
     * @param int    $y  Y in the X for Y discount
     * @param Ad $ad Ad Object
     */
    public function __construct(int $x, int $y, Ad $ad)
    {
        $this->x = $x;
        $this->y = $y;
        $this->ad = $ad;
    }

    /**
     * Calculate the X for Y type discount
     * @param  Array  $orderArray Array of orders
     * @return double             Total with discount
     */
    public function calculate(Array $orderArray)
    {
        $count = sizeof($orderArray);
        $originalPrice = $this->ad->price;

        $discountedPrice = 0;
        if ($count >= $this->x) {
            $discountedUnits = round(($count / $this->x),0);
            $discountedPrice = $discountedUnits * $this->y * $originalPrice;
        }

        $remainderPrice = ($count % $this->x) * $originalPrice;

        $totalPrice = $discountedPrice + $remainderPrice;

        return $discountedPrice + $remainderPrice;
    }
}
