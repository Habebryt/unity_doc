<?php
class Utilities {
    public static function firstName($firstName){
        $cleanFirstName = trim($firstName);
        $cleanFirstName = strip_tags($cleanFirstName);
        $cleanFirstName = addslashes($cleanFirstName);
        $cleanFirstName = htmlentities($cleanFirstName);
        return $cleanFirstName;
    }

    public static function lastName($lastName){
        $cleanLastName = trim($lastName);
        $cleanLastName = strip_tags($cleanLastName);
        $cleanLastName = addslashes($cleanLastName);
        $cleanLastName = htmlentities($cleanLastName);
        return $cleanLastName;
    }

    public static function email($email){
        $cleanEmail = trim($email);
        $cleanEmail = filter_var($cleanEmail, FILTER_SANITIZE_EMAIL);
        return $cleanEmail;
    }

    public static function phone($phone){
        $cleanPhone = trim($phone);
        $cleanPhone = preg_replace('/[^0-9]/', '', $cleanPhone);
        return $cleanPhone;
    }
}



?>