<?php
    require_once("../models/Usuario.php");

    $json = file_get_contents('php://input');
    $decodedData = json_decode($json,true);

    $usuarioName = $decodedData["Usuario"];
    $UserPW = md5($decodedData["Password"]);

    $response = "";

    try {
        $usuario = new Usuario();
        $listUsers = $usuario->listar();
        
    } catch(Exception $e) {
        echo $e->getMessage();
    }

    $count = count($listUsers);
    for ($i = 0; $i < $count; $i++) {
        if(($usuarioName == $listUsers[$i]["usuario"]) && ($UserPW == $listUsers[$i]["senhaUsuario"])){
            $message = $listUsers[$i]["isAdm"] == 1 ? "adm_user" : "normal_user";
            $listUsers[$i]["Message"] =$message;
            $response = json_encode($listUsers[$i]);
            break;

        }else if($i == ($count - 1)){
            $response = json_encode(array("Message" => "unregistered_user"));           
        }
    }

    
    echo ($response);

?>