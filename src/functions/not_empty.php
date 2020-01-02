<?php
/**
 * Copyright (c) 2020 - Leonardo Scapinello
 * • @leoscapinello at @ristocucina
 *
 *
 *
 */

function not_empty($string)
{

    if (is_string($string)) {
        if ($string !== null && trim($string) !== "") {
            if (strlen($string) > 0) {
                return $string;
            }
        }
    }
    return null;

}


?>