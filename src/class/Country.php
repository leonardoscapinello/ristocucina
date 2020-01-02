<?php

class Country extends Charset
{


    public function getCountryCompleteName($country_iso){

        global $database;
        $database->query("SELECT name FROM country WHERE iso = ?");
        $database->bind(1, $country_iso);
        $resultSet = $database->resultset();
        if(count($resultSet) > 0){
            return $resultSet[0]['name'];
        }

    }



}
