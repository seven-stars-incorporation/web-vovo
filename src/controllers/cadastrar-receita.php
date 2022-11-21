<?php
    require_once("../models/ReceitaIngrediente.php");
    require_once("../models/Receita.php");
    require_once("../models/Ingrediente.php");

    $receita = new Receita();
    $ingredienteClass = new Ingrediente();
    $receitaIngrediente = new ReceitaIngrediente();

    //IMAGEM
    $nome = $_FILES['image']['name'];
    $arquivo = $_FILES['image']['tmp_name'];
    $caminho = "assets/images/receitas/". time().".png";
    move_uploaded_file($arquivo, "../".$caminho);

    //CADASTRO DA RECEITA
    $receita->setNomeReceita($_POST['description']);
    $receita->setTempoReceita($_POST['time']);
    $receita->setModoPreparo($_POST['preparationMode']);
    $receita->setCaminhoImg($caminho);

    $lastID = $receita->cadastrar($receita); //ID QUE FOI CADASTRADO A RECEITA


    //CADASTRO DOS INGREDIENTES

    $ingredienteList = explode("\n", $_POST['Ingredients']); //SEPARA OS INGREDIENTES NO \n

    //FORMULA DO INGREDIENTE: UNIDADE NOME_INGREDIENTE == VALOR

    foreach ($ingredienteList as $ingrediente){
        $spacePOS = strpos($ingrediente, " "); //PEGA A POS DO PRIMEIRO ESPAÇO
        $equalsPOS = strpos($ingrediente, "=="); //PEGA A POS DO EQUALS
        $unidade = substr($ingrediente, 0 , $spacePOS); //PEGA O TEXTO QUE ESTIVER ANTES DO PRIMEIRO ESPAÇO (UNIDADE DA RECEITA)
        $nome = substr($ingrediente, $spacePOS, $equalsPOS-2); //PEGA O TEXTO QUE ESTIVER ENTRE O ESPAÇO E O EQUALS
        $valor = substr($ingrediente, $equalsPOS+2); //PEGA O TEXTO QUE ESTIVER DEPOIS DO EQUALS
        $valor = trim($valor); //TRATAMENTO DA STRING
        $valor = str_replace(",", ".", $valor); //TRATAMENTO DA STRING
        $valor = floatval($valor); //STRING TO FLOAT

        //CADASTRAR DADOS NO MODEL
        $ingredienteClass->setNomeIngrediente(trim($nome));
        $ingredienteClass->setValorIngrediente($valor);

        $receitaIngrediente->setUnidadeIngrediente($unidade);
        $receitaIngrediente->setIdReceita($lastID);

        $receitaIngrediente->cadastrar($receitaIngrediente, $ingredienteClass);
    }

    header("Location: ../private/adm/index.php?msg=Receita Cadastrada");
?>