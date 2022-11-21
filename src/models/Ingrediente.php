<?php
    require_once("../database/Conexao.php");

    class Ingrediente{
        private $idIngrediente, $valorIngrediente;
        private $nomeIngrediente;

        public function getIdIngrediente(){
            return $this->idIngrediente;
        }
        public function getNomeIngrediente(){
            return $this->nomeIngrediente;
        }
        public function setIdIngrediente($idIngrediente){
            $this->idIngrediente = $idIngrediente;
        }
        public function setNomeIngrediente($nomeIngrediente){
            $this->nomeIngrediente = $nomeIngrediente;
        }

        public function getValorIngrediente()
        {
            return $this->valorIngrediente;
        }

        public function setValorIngrediente($valorIngrediente)
        {
            $this->valorIngrediente = $valorIngrediente;
        }

        public function listar(){
            $con = Conexao::conectar();
            $querySelect = "SELECT * FROM tbingrediente";
            $resultado = $con->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function listLikeName($name){
            $con = Conexao::conectar();
            $querySelect = "SELECT * FROM tbingrediente WHERE nomeIngrediente LIKE \"%" . $name . "%\"";
            $resultado = $con->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }
?>