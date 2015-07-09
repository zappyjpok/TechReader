<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 7/07/2015
 * Time: 8:31 PM
 */

namespace App\library;


class Functions {

    public static function checkEmpty($value)
    {
        if(!empty($value))
        {
            return $value;
        } else {
            return 'No Data Available';
        }
    }
}