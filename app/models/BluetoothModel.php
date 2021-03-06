<?php

require('app/config/database.php');
error_reporting(-1);
ini_set('display_errors', 'On');
header("Content-Type: application/json;charset=utf-8");


use Illuminate\Support\Facades\Validator;

class Bluetooth extends Illuminate\Database\Eloquent\Model {

    protected $table = 'bluetooth';

    protected $fillable = array(
        'client_mac', 'rssi', 'detection_time',
        'client_name', 'actual_at_server', 'is_being_sent'
    );

}

?>