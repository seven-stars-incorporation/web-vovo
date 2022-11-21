<?php
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include_once("../api/api.config.php");
    $url = "{$URL}/api/api-cadUser.php";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "Accept: application/json",
    "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = array("Name" => $nome, "Usuario" => $usuario, "Email"=>$email, "Password"=>$senha);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    $resp = curl_exec($curl);
    curl_close($curl);
    echo ($resp);
    $decodedResponse = json_decode($resp, true);

    switch ($decodedResponse["Message"]){
        case "OK":
            header("Location: ../login.php?msg=Faça Login");
            break;
        case "email_already_exists":
            header("Location: ../sign-up.php?msg=Email já Existe");
            break;
        case "user_already_exists":
            header("Location: ../sign-up.php?msg=Usuário já Existe");
            break;

    }
?>