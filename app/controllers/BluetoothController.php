<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/BluetoothModel.php');


class BluetoothController {

    public function postBluetooth($data){
        $bluetooth = new Bluetooth();
        $success = false;
        $codeServer = 500;
        foreach ($data as $d){
            $bluetooth->create($d);
            if ($bluetooth->save()){
                $message = 'Success';
                $success = true;
                $codeServer = 200;
                return array('message'=> $message, 'response'=> $success, 'codeServer' => $codeServer);
            }else{
                $message = 'Error';
                return array('message'=> $message, 'response'=> $success, 'codeServer' => $codeServer);
            }
        }
    }
}

?>