<?php

interface DiscountInterface
{
    abstract function calculate(Array $orderArray);
}
