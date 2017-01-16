<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('app/models/MessageModel.php');

class MessageController {
    public function index(){

    }

    public function store($data){
        foreach ($data as $d){
            $meta = Message::insert(array('urid' => $d['urid'], 'deviceHostname' => $d['deviceHostname'],
                'message' => $d['receivingFunction'], 'arguments' => json_encode($d['arguments'])));
        }

        if (isset($meta)){
            echo json_encode(array('response' => 'Success: The message has been added to the DB', 'codeServer' => 200));
        }else{
            echo json_encode(array('response' => 'Error: The message has not been added to the DB', 'codeServer' => 200));
        }
    }

    public function show($meta){
        $message = Message::where('urid', $meta[0]['urid'])->where('send', '0')->get()->toArray();

        if(count($message) > 0){
            $message1 = Message::where('urid', $meta[0]['urid'])->where('send', '0')->update(['send' => '1']);
            foreach ($message as $data){
                $data['arguments'] = json_decode($data['arguments']);
                return $data;
            }
        }else{
            return 'No hay mensajes para enviar';
        }

    }

    public function delete($id){

    }
}