<?php

class Ad
{
    /**
     * ID of this add
     * @var string
     */
    public $id;

    /**
     * Name of this Ad
     * @var string
     */
    public $name;

    /**
     * Price of this ad
     * @var float
     */
    public $price;

    /**
     * Description for this Ad
     * @var string
     */
    public $description;

    /**
     * Constructor
     * @param string $id          ID of this ad
     * @param string $name        Name of this ad
     * @param float  $price       Price for this ad
     * @param string $description Description
     */
    public function __construct($id, $name, float $price, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    /**
     * Generic calculation function for no discount
     * @param  Array  $adArray Array of ads
     * @return float          Total
     */
    public static function calculate(Array $adArray)
    {
        $total = 0;
        foreach ($adArray as $ad) {
            $total += $ad->price;
        }
        return $total;
    }
}
