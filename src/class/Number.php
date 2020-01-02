<?php
setlocale(LC_MONETARY, 'en_US');

class Number
{

    private $number = 0;

    public function is_numeric($number)
    {
        if (is_numeric($number)) {
            return true;
        }
        return false;
    }

    public function money($number)
    {
        if ($this->is_numeric($number)) {
            return number_format($number, 2);
        }
        return number_format(0, 2);
    }

    public function noDecimal($number)
    {
        if ($this->is_numeric($number)) {
            return number_format($number, 0, ",", ".");
        }
        return number_format(0, 0, ",", ".");
    }

    public function isIdentity($number)
    {
        if ($number !== null && $number !== "") {
            if ($this->is_numeric($number)) {
                if ($number > 0) {
                    return true;
                }
            }
        }
    }

    public function weight($number)
    {
        if ($number !== null && $number !== "") {
            if ($this->is_numeric($number)) {
                if ($number < 1000) {
                    return round($number) . "g";
                } else {
                    $weight = ($number / 1000);

                    return round($weight, 1) . "kg";

                }
            }
        }
    }

    public function biggerZero($number)
    {
        if ($number !== null && $number !== "") {
            if ($this->is_numeric($number)) {
                if ($number > 0) {
                    return true;
                }
            }
        }
    }

}