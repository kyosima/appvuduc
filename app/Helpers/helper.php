<?php 

if (!function_exists('helper')) {
    function moneyFormat($price)
    {
        return number_format($price, 0, '', ',');
    }
}
if (!function_exists('formatPrice')) {
    function formatPrice($price)
    {
        return number_format($price, 0, '.', ',') . '₫';
    }
}