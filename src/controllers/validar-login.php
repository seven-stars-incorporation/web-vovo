<?php
    //$email = $_POST['email'];
    $user = $_POST['usuario'];
    $senha = $_POST['senha'];
    $remember = isset($_POST['remember-me']);

    include_once("../api/api.config.php");
    include_once("../utils/session.php");

    $url = "{$URL}/api/api-loginUser.php";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "Accept: application/json",
    "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = array("Usuario"=>$user, "Password"=>$senha);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    $resp = curl_exec($curl);
    curl_close($curl);
    $decodedResponse = json_decode($resp, true);
    switch (@$decodedResponse["Message"]) {

        case "unregistered_user":
            header("Location: ../login.php?msg=Usuário ou Senha Incorretos");

        case "adm_user":
            session_write($decodedResponse, $remember);
            header("Location: ../private/adm/index.php");

        case "normal_user":
            var_dump($decodedResponse);

    }

    session_write($decodedResponse, $remember);
?>