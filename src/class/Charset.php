<?php

class Charset
{

    private $str;

    public function setString($string)
    {
        $this->str = $string;
    }

    public function utf8()
    {
        $string = $this->str;
        if ($this->isString()) {
            $string = iconv(mb_detect_encoding($string, "UTF-8,ISO-8859-1"), "UTF-8", $string);
            return $string;
        }
        return null;
    }

    public function uppercase()
    {
        $string = $this->str;
        if ($this->isString()) {
            $string = mb_convert_case($string, MB_CASE_UPPER, "UTF-8");
            return $string;
        }
        return null;
    }

    public function lowecase()
    {
        $string = $this->str;
        if ($this->isString()) {
            $string = mb_convert_case($string, MB_CASE_LOWER, "UTF-8");
            return $string;
        }
        return null;
    }

    public function isString()
    {
        if ($this->str !== null) {
            if (is_string($this->str)) {
                if (strlen($this->str) > 0) {
                    return true;
                }
            }
        }
        return false;
    }

}