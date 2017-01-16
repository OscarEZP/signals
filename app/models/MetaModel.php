<?php
require('app/config/database.php');
error_reporting(-1);
ini_set('display_errors', 'On');
header("Content-Type: application/json;charset=utf-8");

use Illuminate\Support\Facades\Validator;

class Meta extends Illuminate\Database\Eloquent\Model {
    protected $table = 'status';

    protected $fillable = array(
        'deviceHostname','deviceUID', 'geo_lat', 'geo_lon', 'arguments',

    );
}