<?php
require('app/config/database.php');
error_reporting(-1);
ini_set('display_errors', 'On');
header("Content-Type: application/json;charset=utf-8");

use Illuminate\Support\Facades\Validator;

class Raspberry extends Illuminate\Database\Eloquent\Model {
    protected $table = 'raspberry';

    protected $fillable = array(
        'deviceHostname','deviceUID',

    );
}