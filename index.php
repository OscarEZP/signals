<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('app/controllers/BluetoothController.php');
require('app/controllers/WifiController.php');
require('app/controllers/ObjectToArray.php');

$data = json_decode(file_get_contents('php://input'));
$data = cvf_convert_object_to_array($data);



if(isset($data['signalB'])) {

    $data = $data['signalB'];
    $psBluetooth = new BluetoothController();
    $psBluetooth = $psBluetooth->postBluetooth($data);
    $result = json_encode($psBluetooth);
    header('Content-type: application/json');
    echo $result;


}else if (isset($data['signalW'])){

    $data = $data['signalW'];
    $psWifi = new WifiController();
    $psWifi = $psWifi->postWifi($data);
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