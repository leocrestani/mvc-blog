<?php

/** 
 * @Desc: Este Helper tem o único objetivo de fornecer
 * o redirect de uma forma mais cômoda para as classes
 */
class Url
{
    public static function redirect($location)
    {
        header("Location:" . URL . DIRECTORY_SEPARATOR . $location);
    }
}