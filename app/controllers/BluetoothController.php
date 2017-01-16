<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/BluetoothModel.php');

require('calc_time.php');
use Illuminate\Support\Facades\Validator;

class BluetoothController {

    public function postBluetooth($data, $meta){
        $success = false;
        $codeServer = 200;
        $date = gmdate(DATE_ISO8601, strtotime($meta[0]['messageTimestamp'][0]));
        $this_moment1 = strtotime("+3 minutes");
        $this_moment2 = strtotime("-3 minutes");
        $date1 = gmdate(DATE_ISO8601, $this_moment1);
        $date2 = gmdate(DATE_ISO8601, $this_moment2);
        $meta[0]['arguments'][0] = $date;


        /*if (strtotime($date) < strtotime($date1) && strtotime($date) > strtotime($date2)){*/
            foreach ($data as $d) {

                $bluetooth = Bluetooth::insert(array('client_mac' => $d['client_mac'],
                    'rssi' => $d['rssi'], 'detection_time' => $d['detection_time'],
                    'client_name' => $d['client_name'], 'actual_at_server' => $d['actual_at_server'], 'is_being_sent' => $d['is_being_sent']));
            }
            if (isset($bluetooth)){
                $message = new MessageController();
                $message = $message->show($meta);


                return array('message'=> $message, 'response'=> true, 'codeServer' => 200);
            }else{
                $message = 'El registro está vacío';
                return array('message'=> $message, 'response'=> $success, 'codeServer' => $codeServer);
            }
        /*}else{
            $meta[0]['receivingFunction'] = 'changeDate';
            return array('message'=> "Error", 'response'=> $meta, 'codeServer' => '201', 'date' => $date);
        }*/

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