<?php
if (!isset($_GET["id_recipe"]) || !isset($_GET["name_category"])){
    header('location: ../views/index.php');
}

$idsRecipes = $_GET["id_recipe"] . ',' . @$_COOKIE["recipes_favs"];
$categsFavs = $_GET["name_category"] . ',' . @$_COOKIE['categories_favs'];

setcookie("recipes_favs", $idsRecipes, time() + (10 * 365 * 24 * 60 * 60), '/');
setcookie("categories_favs", $categsFavs, time() + (10 * 365 * 24 * 60 * 60), '/');


header("location: ../views/favoritos.php");