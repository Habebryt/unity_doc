<?php
class Utilities
{
    public static function cleanText($cleanText)
    {
        $cleanText = trim($cleanText);
        $cleanText = strip_tags($cleanText);
        $cleanText = addslashes($cleanText);
        $cleanText = htmlentities($cleanText);
        $cleanText = ucwords($cleanText);
        return $cleanText;
    }


    public static function firstName($firstName)
    {
        $cleanFirstName = trim($firstName);
        $cleanFirstName = strip_tags($cleanFirstName);
        $cleanFirstName = addslashes($cleanFirstName);
        $cleanFirstName = htmlentities($cleanFirstName);
        return $cleanFirstName;
    }

    public static function lastName($lastName)
    {
        $cleanLastName = trim($lastName);
        $cleanLastName = strip_tags($cleanLastName);
        $cleanLastName = addslashes($cleanLastName);
        $cleanLastName = htmlentities($cleanLastName);
        return $cleanLastName;
    }

    public static function email($email)
    {
        $cleanEmail = trim($email);
        $cleanEmail = filter_var($cleanEmail, FILTER_SANITIZE_EMAIL);
        return $cleanEmail;
    }

    public static function phone($phone)
    {
        $cleanPhone = trim($phone);
        $cleanPhone = preg_replace('/[^0-9]/', '', $cleanPhone);
        return $cleanPhone;
    }

    public static function reduceTitle($title)
    {
        if (strlen($title) > 20) {
            $short_title = substr($title, 0, 20) . "...";
            return $short_title;
        } else {
            return $title;
        }
    }

    public static function getFirstLetterOfLastName($lastname)
    {
        return substr($lastname, 0, 1);
    }
    public static function getDateParts($datetime)
    {
        $dateParts = date_parse($datetime);
        if ($dateParts['error_count'] === 0 && $dateParts['warning_count'] === 0) {
            $month = $dateParts['month'];
            $day = $dateParts['day'];
            $year = $dateParts['year'];
            return "$month/$day/$year";
        } else {
            return "Invalid Date";
        }
    }
}
