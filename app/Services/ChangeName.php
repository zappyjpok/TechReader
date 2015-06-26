<?php

namespace App\Services;

use App;

class ChangeName {

    public static function changeToThumbnail($image)
    {
        $nameParts = pathinfo($image);
        $Name = $nameParts['filename'];
        $pattern = "/$Name/";
        $replace = $Name. '_tn';
        $newName = preg_replace($pattern, $replace, $image);

        return $newName;
    }

    /**
     * @param $value
     * @return mixed
     */
    public static function changeToLocalEnvironment($value, $find)
    {
        if (App::isLocal())
        {
            $needle = strpos($value, $find);
            $newName = substr($value, $needle-1);

            $value = $newName;
        }

        return $value;
    }


}
