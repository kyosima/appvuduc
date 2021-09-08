<?php 

if (!function_exists('helper')) {
    function moneyFormat($price)
    {
        return number_format($price, 0, '', ',');
    }
}