<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/BluetoothModel.php');
use Illuminate\Support\Facades\Validator;

class BluetoothController {

    public function postBluetooth($data){
        $success = false;
        $codeServer = 500;
        foreach ($data as $d) {

        $bluetooth = Bluetooth::insert(array('name' => $d['name'], 'client_mac' => $d['client_mac'],
            'rssi' => $d['rssi'], 'detection_time' => $d['detection_time'],
            'geo_lat' => $d['geo_lat'], 'geo_lon' => $d['geo_lon'], 'client_name' => $d['client_name']));
        }
        if ($bluetooth){
            $message = 'Success';
            $success = true;
            $codeServer = 200;
            return array('message'=> $message, 'response'=> $success, 'codeServer' => $codeServer);
        }else{
            $message = 'Error';
            return array('message'=> $message, 'response'=> $success, 'codeServer' => $codeServer);
        }

    }

    public function getBluetooth(){
        return Bluetooth::all()->toArray();

    }
    public function getBluetoothId($id){
        return Bluetooth::find($id)->toArray();
    }

    public function dropBt(){
        return Bluetooth::truncate();
    }
}




?>