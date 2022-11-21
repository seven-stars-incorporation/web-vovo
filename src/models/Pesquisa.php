<?php
require_once("../database/Conexao.php");


class Pesquisa
{
    private $id_pesquisa, $id_receita;

    /**
     * @return mixed
     */
    public function getIdPesquisa()
    {
        return $this->id_pesquisa;
    }

    /**
     * @param mixed $id_pesquisa
     */
    public function setIdPesquisa($id_pesquisa)
    {
        $this->id_pesquisa = $id_pesquisa;
    }

    /**
     * @return mixed
     */
    public function getIdReceita()
    {
        return $this->id_receita;
    }

    /**
     * @param mixed $id_receita
     */
    public function setIdReceita($id_receita)
    {
        $this->id_receita = $id_receita;
    }

    public function write_pesquisa($pesquisa){
        $con = Conexao::conectar();
        $stmt = $con->prepare("INSERT INTO tbpesquisa(idreceita) VALUES (?)");
        $stmt->bindValue(1, $pesquisa->getIdReceita());
        $stmt->execute();
    }
}