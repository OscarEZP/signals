<?php

require('app/config/database.php');
error_reporting(-1);
ini_set('display_errors', 'On');
header("Content-Type: application/json;charset=utf-8");


use Illuminate\Support\Facades\Validator;

class Bluetooth extends Illuminate\Database\Eloquent\Model {

    protected $table = 'bluetooth';

    protected $fillable = array(
        'name','client_mac', 'rssi', 'detection_time','geo_lat', 'geo_lon',
        'client_name'
    );

    public $errors;

    public function getErrors() {
        return $this->errors;
    }

    public $rules = array(
        'name' => 'required|exists',
        'client_mac' => 'required|exists',
        'rssi' => 'required|exists',
        'detection_time' => 'required|exists',
        'geo_lat' => 'required|exists',
        'geo_lon' => 'required|exists',
        'client_name' => 'required|exists'
    );

    public function is_valid($data) {
        $v = Validator::make($data, $this->rules);
        if ($v->fails()){
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }

}

?>