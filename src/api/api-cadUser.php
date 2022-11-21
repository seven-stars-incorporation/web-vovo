<?php
    require_once("../models/Usuario.php");

    $json = file_get_contents('php://input');
    $decodedData = json_decode($json,true);

    $userEmail = $decodedData['Email'];
    $user = $decodedData['Usuario'];
    $userName = $decodedData['Name'];
    $UserPW = md5($decodedData['Password']);

    $response = "";

    $usuario = new Usuario();

    $emailExists = $usuario->emailExists($userEmail);
    $userExists = $usuario->userExists($user);

    if($emailExists){
        $response = json_encode(array("Message" => "email_already_exists"));
    }else if($userExists){
        $response = json_encode(array("Message" => "user_already_exists"));
    }else{
        $usuario->setNomeUsuario($userName);
        $usuario->setUsuario($user);
        $usuario->setEmailUsuario($userEmail);
        $usuario->setSenhaUsuario($UserPW);
        $usuario->cadastrar($usuario);

        $response = json_encode(array("Message" => "OK"));
    }


    echo($response);

?>