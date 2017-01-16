<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29/12/16
 * Time: 15:25
 */

function calc_hour_and_minute($hora1, $hora2){
    $date_dato[1]=explode(':',$hora1);
    $date_dato[2]=explode(':',$hora2);

    $total[1] = ($date_dato[1][0]*60)+$date_dato[1][1];
    $total[2] = ($date_dato[2][0]*60)+$date_dato[2][1];

    $total = $total[2]-$total[1];

    return $total;
}


?>

