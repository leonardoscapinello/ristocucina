<?php

class Date
{

    private $additional_time;
    private $date;


    private function dateFormat()
    {
        return "d/m/Y h:i:s";
    }

    private function getAdditionalTime()
    {
        global $account_settings;
        if ($this->additional_time == null || $this->additional_time == "") {
            return date($this->dateFormat());
        }
        return $this->additional_time;
    }

    public function setAdditionalTime($additional)
    {
        $this->additional_time = $additional;
    }


    public function getDate()
    {
        global $account_settings;
        $newDate = date($this->dateFormat(), strtotime($this->getAdditionalTime()));
        if ($this->date !== null) {
            $newDate = date($this->dateFormat(), strtotime($this->date));
        }
        $this->date = null;
        return $newDate;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDateTime()
    {
        global $account_settings;
        if ($this->date !== null) {
            $newDate = date($this->dateFormat(), strtotime($this->date));
        }
        $this->date = null;
        return $newDate;
    }


    function convertDate($date)
    {
        return date($this->dateFormat(), strtotime($date));
    }
}
