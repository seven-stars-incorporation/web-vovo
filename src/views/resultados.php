<?php
if (!isset($_POST["list-recipe-names"])){
    header('location: index.php');
}
?>
<?php
include_once("./layouts/header.php");
require_once("../models/ReceitaIngrediente.php");

$receitaIngrediente = new ReceitaIngrediente();

$postIngredients = explode(',', $_POST["list-recipe-names"]);
array_pop($postIngredients);
$listLikeName = array();

foreach($postIngredients as $ingredient){
  $listLikeName[] = $ingredienteClass->listLikeName($ingredient);
}

$listRecipes = array();

foreach($listLikeName[0] as $ingredient){
  $listRecipes[] = $receitaIngrediente->listarPIngrediente($ingredient["idIngrediente"]);
}

echo json_encode($listRecipes);

?>
  

    
<?php
include_once("./layouts/footer.php")
?>
