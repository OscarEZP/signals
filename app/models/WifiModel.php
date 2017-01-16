<?php

require('app/config/database.php');
error_reporting(-1);
ini_set('display_errors', 'On');
header("Content-Type: application/json;charset=utf-8");

use Illuminate\Support\Facades\Validator;

class Wifi extends Illuminate\Database\Eloquent\Model {
    protected $table = 'wifi';

    protected $fillable = array(
        'station_mac', 'first_time_seen', 'last_time_seen','rssi', 'number_of_packets',
        'actual_at_server', 'is_being_sent', 'bssid'
    );
}