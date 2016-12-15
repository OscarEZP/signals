<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/12/16
 * Time: 16:08
 */

// Function that allows you to transform an object into an array
function cvf_convert_object_to_array($data) {

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}


?>