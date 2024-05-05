<?php


class Constants
{
    public static $student = 1;
    public static $instructor = 2;
    public static $adminId = 3;

    static function isValidDateFormat($dateString) {
        return preg_match("/^\d{4}[-\/]\d{2}[-\/]\d{2}$/", $dateString);
    }
}

