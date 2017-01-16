<?php
require('app/config/database.php');
error_reporting(-1);
ini_set('display_errors', 'On');
header("Content-Type: application/json;charset=utf-8");

use Illuminate\Support\Facades\Validator;

class Message extends Illuminate\Database\Eloquent\Model {
    protected $table = 'messages';

    protected $fillable = array(
        'deviceHostname','deviceUID', 'message'
    );
}