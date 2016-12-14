<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/WifiModel.php');

class WifiController {
    public function postWifi($data){
        $wifi = new Wifi();
        $success = false;
        $codeServer = 500;
        foreach ($data as $d){
            $wifi->create($d);
            if ($wifi->save()){
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