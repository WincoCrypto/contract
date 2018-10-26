<?php

namespace WincoCrypto\Helpers;

class Utils
{
    public static function toArray($data)
    {
        if (is_object($data)) {
            $data = get_object_vars($data);
        }
    
        if (is_array($data)) {
            return array_map(__METHOD__, $data);
        }
        else {
            return $data;
        }
    }
}