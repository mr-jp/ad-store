<?php

interface DiscountInterface
{
    public abstract function calculate(Array $orderArray);
}
