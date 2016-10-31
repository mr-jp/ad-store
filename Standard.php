<?php

class Standard implements DiscountInterface
{
    /**
     * Amount for a standard discount to be applied
     * @var float
     */
    public $amount;

    /**
     * Ad object
     * @var Ad
     */
    public $ad;

    /**
     * Constructor
     * @param float $amount Amount for standard discount
     * @param Ad    $ad     Ad object
     */
    public function __construct(float $amount, Ad $ad)
    {
        $this->amount = $amount;
        $this->ad = $ad;
    }

    /**
     * Calculate Standard discount
     * @param  Array  $orderArray Array of ads to be added
     * @return float             Total with the discount
     */
    public function calculate(Array $orderArray)
    {
        $total = 0;

        foreach ($orderArray as $item) {
            $total += $this->amount;
        }

        return $total;
    }
}
