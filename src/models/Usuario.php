<?php
    require_once("../database/Conexao.php");

    class Usuario{
        private $idUsuario, $emailUsuario, $senhaUsuario, $nomeUsuario, $usuario;

        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function getNomeUsuario(){
            return $this->nomeUsuario;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function getEmailUsuario(){
            return $this->emailUsuario;
        }
        public function getSenhaUsuario(){
            return $this->senhaUsuario;
        }
        public function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }
        public function setNomeUsuario($nomeUsuario){
            $this->nomeUsuario = $nomeUsuario;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function setEmailUsuario($emailUsuario){
            $this->emailUsuario = $emailUsuario;
        }
        public function setSenhaUsuario($senhaUsuario){
            $this->senhaUsuario = $senhaUsuario;
        }

        public function cadastrar($usuario){
            $con = Conexao::conectar();
            $stmt = $con->prepare("INSERT INTO tbusuario(nomeUsuario, usuario, senhaUsuario, emailUsuario)
                                    VALUES(?,?,?,?)");
            $stmt->bindValue(1, $usuario->getNomeUsuario());
            $stmt->bindValue(2, $usuario->getUsuario());
            $stmt->bindValue(3, $usuario->getSenhaUsuario());
            $stmt->bindValue(4, $usuario->getEmailUsuario());
            $stmt->execute();
        }

        public function emailExists($email){
            $exist = false;
            $con = Conexao::conectar();
            $stmt = $con->prepare("SELECT * FROM tbusuario WHERE emailusuario = ?");
            $stmt->bindValue(1, $email);
            $stmt->execute();
            $lista = $stmt->fetchAll();
            if(count($lista) > 0){
                $exist = true;
            }
            return $exist;
        }

        public function userExists($user){
            $exist = false;
            $con = Conexao::conectar();
            $stmt = $con->prepare("SELECT * FROM tbusuario WHERE usuario = ?");
            $stmt->bindValue(1, $user);
            $stmt->execute();
            $lista = $stmt->fetchAll();
            if(count($lista) > 0){
                $exist = true;
            }
            return $exist;
        }

        public function listar(){
            $con = Conexao::conectar();
            $querySelect = "SELECT * FROM tbusuario";
            $resultado = $con->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }
?>