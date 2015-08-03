<?php

namespace App\library;

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
        } else {
            $needle = strpos($value, 'public');
            $newName = substr($value, $needle-1);

            $value = $newName;
        }

        return $value;
    }

    public static function replaceLinkSpaces($value)
    {
        $replace = str_replace(' ', '_', $value);
        if(substr($replace, -1) === '_')
        {
            $replace = substr_replace($replace, "", -1);
        }
        return $replace;
    }

    public static function shortenString($value, $length)
    {
        $short = substr($value, 0, $length);
        return $short;
    }




}
