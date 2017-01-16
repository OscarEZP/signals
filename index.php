<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('app/controllers/BluetoothController.php');
require('app/controllers/WifiController.php');
require('app/controllers/MetaController.php');
require('app/controllers/MessageController.php');
require('app/controllers/RaspberryController.php');
require('app/controllers/ObjectToArray.php');

$data = json_decode(file_get_contents('php://input'));
$data = cvf_convert_object_to_array($data);

$meta = isset($data['meta']) ? $data['meta']: null;
$metaApp = isset($data['metaApp']) ? $data['metaApp']: null;

if($meta){

    $metainsert = new MetaController();
    $metainsert = $metainsert->store($meta);

    $rasp = new RaspberryController();
    $rasp = $rasp->store($meta);

}

if($metaApp){
    $psMessage = new MessageController();
    $psMessage = $psMessage->store($metaApp);
}

if(isset($data['signalB'])) {
    $signal = $data['signalB'];

    $psBluetooth = new BluetoothController();
    $psBluetooth = $psBluetooth->postBluetooth($signal, $meta);
    $result = json_encode($psBluetooth);
    header('Content-type: application/json');
    echo $result;


}else if (isset($data['signalW'])){

    $signal = $data['signalW'];

    $psWifi = new WifiController();
    $psWifi = $psWifi->postWifi($signal, $meta);
    $result = json_encode($psWifi);
    header('Content-type: application/json');
    echo $result;

}else if (isset($_POST['bt'])){

    $bluetooth = new BluetoothController();
    echo json_encode($bluetooth->getBluetooth());

}else if (isset($_POST['wf'])){

    $wifi = new WifiController();
    echo json_encode($wifi->getWifi());

}else if (isset($_GET['get_wf'])){

    $wifi = new WifiController();
    echo json_encode($wifi->getWifiId($_GET['id']));
}else if (isset($_GET['get_bt'])){

    $bluetooth = new BluetoothController();
    echo json_encode($bluetooth->getBluetoothId($_GET['id']));
}else if (isset($_POST['drop_bt'])){

    $bluetooth = new BluetoothController();
    echo json_encode($bluetooth->dropBt());

}else if (isset($_POST['drop_wf'])){

    $wifi = new WifiController();
    echo json_encode($wifi->dropWf());
}


?>