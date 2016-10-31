<?php

class Client
{
    /**
     * Name of the client
     * @var String
     */
    public $name;

    /**
     * Discounts for this client
     * @var array
     */
    public $discounts;

    /**
     * Ads ordered by this client
     * @var array
     */
    public $ads;

    /**
     * Constructor
     * @param String $name Name of this client
     */
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    /**
     * Add a discount for this person
     * @param Discount $discount Discount to be added for this person
     */
    public function addDiscount(DiscountInterface $discount)
    {
        // Group by ad id
        // Assume that only one type of discount can be applied to a single ad type
        // If many discounts are provided on a ad type, only the last one is valid
        $this->discounts[$discount->ad->id] = $discount;
    }

    /**
     * When a client places an Ad order
     * @param  Ad     $ad Ad object
     * @return void
     */
    public function order(Ad $ad)
    {
        // Group by ad id
        $this->ads[$ad->id][] = $ad;
    }

    /**
     * Calculate the totals based on discounts
     * @return float Total of all this persons' orders with discounts applied
     */
    public function calculateTotals()
    {
        $total = 0;

        // Calculate by Ad type groups
        if (!empty($this->ads)) {
            foreach ($this->ads as $group => $adArray) {

                // Check if a discount is found for this ad
                if (isset($this->discounts[$group])) {

                    // Calculate with discounts
                    $discountType = $this->discounts[$group];
                    $total += $discountType->calculate($adArray);

                } else {

                    // No discount, just calculate the total
                    $total += Ad::calculate($adArray);
                }
            }
        }

        return $total;
    }
}
