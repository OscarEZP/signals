<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/WifiModel.php');

class WifiController {
    public function postWifi($data, $meta){

        $success = false;
        $codeServer = 200;
        $date = gmdate(DATE_ISO8601, strtotime($meta[0]['messageTimestamp'][0]));
        $this_moment1 = strtotime("+3 minutes");
        $this_moment2 = strtotime("-3 minutes");
        $date1 = gmdate(DATE_ISO8601, $this_moment1);
        $date2 = gmdate(DATE_ISO8601, $this_moment2);
        $meta[0]['arguments'][0] = $date;


        /*if (strtotime($date) < strtotime($date1) && strtotime($date) > strtotime($date2)){*/
            foreach ($data as $d){
                $wifi = Wifi::insert(array('station_mac' => $d['station_mac'], 'first_time_seen' => $d['first_time_seen'],
                    'last_time_seen' => $d['last_time_seen'],'rssi' => $d['rssi'],'number_of_packets' => $d['number_of_packets'],
                    'actual_at_server' => $d['actual_at_server'],'is_being_sent' => $d['is_being_sent'],'bssid' => $d['bssid']));
            }

            if (isset($wifi)){
                $message = new MessageController();
                $message = $message->show($meta);
                return array('message'=> $message, 'response'=> true, 'codeServer' => 200);
            }else{
                $message = 'El registro está vacío';
                return array('message'=> $message, 'response'=> $success, 'codeServer' => $codeServer);
            }
        /*}else{

            $meta[0]['receivingFunction'] = 'changeDate';
            return array('message'=> "Error", 'response'=> $meta, 'codeServer' => '201','date' => $date);
        }*/


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