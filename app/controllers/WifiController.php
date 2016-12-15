<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/WifiModel.php');

class WifiController {
    public function postWifi($data){

        $success = false;
        $codeServer = 500;
        foreach ($data as $d){
            $wifi = Wifi::insert(array('name' => $d['name'], 'station_mac' => $d['station_mac'],'first_time_seen' => $d['first_time_seen'],
                'last_time_seen' => $d['last_time_seen'],'rssi' => $d['rssi'],'number_of_packets' => $d['number_of_packets'],
                'geo_lat' => $d['geo_lat'],'geo_lon' => $d['geo_lon'],'actual_at_server' => $d['actual_at_server'],
                'is_being_sent' => $d['is_being_sent'], 'bssid' => $d['bssid'] ));
        }

        if ($wifi){
            $message = 'Success';
            $success = true;
            $codeServer = 200;
            return array('message'=> $message, 'response'=> $success, 'codeServer' => $codeServer);
        }else{
            $message = 'Error';
            return array('message'=> $message, 'response'=> $success, 'codeServer' => $codeServer);
        }

    }

    public function getWifi(){
        return Wifi::all()->toArray();
    }

    public function getWifiId($id){
        return Wifi::find($id)->toArray();
    }

    public function dropWf(){
        return Wifi::truncate();
    }
}