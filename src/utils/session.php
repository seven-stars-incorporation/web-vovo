<?php
    session_start();

    function checkLogin($pathRedirect){
        if(isset($_SESSION['idUser']) == true){
          header("Location: {$pathRedirect}");
        }
    }

    function session_write($decodedResponse, $remember){
      if($remember){
          ini_set('session.gc_maxlifetime', 31536000); // 1 Ano de Duração
          session_set_cookie_params(31536000, '/'); // 1 Ano de Duração
      }

      session_start();
      $_SESSION['username'] = $decodedResponse["nomeUsuario"];
      $_SESSION['email'] = $decodedResponse["emailUsuario"];
      $_SESSION['senha'] = $decodedResponse["senhaUsuario"];
      $_SESSION['idUser'] = $decodedResponse["idUsuario"];      
      $_SESSION['isAdm'] = $decodedResponse["isAdm"] == 1 ? true : false;

      session_commit();
  }
?>