<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/MetaModel.php');

class MetaController{
    public function index(){

    }

    public function store($data){

        foreach ($data as $d){
            $arguments = json_encode($d['arguments'][0]);
            if($d['receivingFunction'] != 'heartbeat'){
                $meta = Meta::insert(array('urid' => $d['urid'], 'receivingFunction'=> $d['receivingFunction'], 'deviceHostname' => $d['deviceHostname'],
                    'geo_lat' => $d['geoLocation']['latitude'], 'geo_lon' => $d['geoLocation']['longitude'], 'arguments' => $arguments));
            }else{

                $meta = Meta::insert(array('urid' => $d['urid'],'receivingFunction'=> $d['receivingFunction'], 'arguments' => $arguments));
            }
        }

        if (isset($meta)){
            echo json_encode(array('response' => 'Success: The meta array has been added to the DB', 'codeServer' => 200));
        }else{
            echo json_encode(array('response' => 'Error: The meta array has not been added to the DB', 'codeServer' => 200));
        }
    }

    public function show($id){

    }

    public function delete($id){

    }
}