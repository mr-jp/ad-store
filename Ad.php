<?php

class Ad
{
    /**
     * ID of this add
     * @var String
     */
    public $id;

    /**
     * Name of this Ad
     * @var String
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
     * @param String $id          ID of this ad
     * @param String $name        Name of this ad
     * @param float  $price       Price for this ad
     * @param String $description Description
     */
    public function __construct(String $id, String $name, float $price, String $description)
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
