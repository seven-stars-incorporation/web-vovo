<?php
    require_once("../database/Conexao.php");

    class Receita{
        private $idReceita, $idsIngredientes, $nomeReceita, $modoPreparo, $tempoReceita, $caminhoImg;

        public function getIdReceita(){
            return $this->idReceita;
        }
        public function getIdsIngredientes(){
            return $this->idsIngredientes;
        }
        public function getNomeReceita(){
            return $this->nomeReceita;
        }
        public function getModoPreparo(){
            return $this->modoPreparo;
        }
        public function getTempoReceita(){
            return $this->tempoReceita;
        }
        public function getCaminhoImg(){
            return $this->caminhoImg;
        }
        public function setIdReceita($idReceita){
            $this->idReceita = $idReceita;
        }
        public function setIdsIngredientes($idsIngredientes){
            return $this->idsIngredientes = $idsIngredientes;
        }
        public function setNomeReceita($nomeReceita){
            return $this->nomeReceita = $nomeReceita;
        }
        public function setModoPreparo($modoPreparo){
            return $this->modoPreparo = $modoPreparo;
        }
        public function setTempoReceita($tempoReceita){
            return $this->tempoReceita = $tempoReceita;
        }
        public function setCaminhoImg($caminhoImg){
            return $this->caminhoImg = $caminhoImg;
        }

        public function read_with_name($category_name){
            $con = Conexao::conectar();
            $querySelect = "SELECT tbreceita.* FROM tbcategoria
                            INNER JOIN tbreceita ON tbcategoria.idReceita = tbreceita.idReceita
                                WHERE descCategoria LIKE \"$category_name\" ";
            $resultado = $con->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function listar(){
            $con = Conexao::conectar();
            $querySelect = "SELECT * FROM tbreceita";
            $resultado = $con->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

    }
?>