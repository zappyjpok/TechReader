<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 4/07/2015
 * Time: 5:00 PM
 */

namespace App\library;


class caculations {

    /**
     * This function calculates the discount price of a product
     *
     * @param $price
     * @param $discount
     * @return int
     */
    public static function caculateDiscountPrice($price, $discount)
    {
        $subtractedValue = 1 - $discount;
        $discountPrice = $price * $subtractedValue;
        $break = stripos((string)$discountPrice, '.') + 3;
        $newPrice = substr($discountPrice, 0, $break);
        return $newPrice;
    }

}