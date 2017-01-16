<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/RaspberryModel.php');


class RaspberryController {
    public function index(){

    }

    public function store($data){
        foreach ($data as $d){

            $rasp = Raspberry::insert(array('deviceHostname' => $d['deviceHostname'], 'urid' => $d['urid']));

            if($rasp){
                return true;
            }
        }

        return false;
    }
}