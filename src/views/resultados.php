<?php
if (!isset($_POST["list-recipe-names"])){
    header('location: index.php');
}
?>
<?php
include_once("./layouts/header.php");

$listLikeName = array();

foreach($_POST["list-recipe-names"] as $ingredient){
  $listLikeName[] = $ingredienteClass->listLikeName($ingredient);
}

$listRecipes = array();



?>
  <main class="container mx-auto mt-10 mb-4 px-4 sm:px-8 max-w-[1440px]">
      <div class="mt-10 bg-white rounded-xl shadow-lg">

        <div class="mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
          <h2 class="text-4xl font-semibold mb-10 text-zinc-900">Receitas recomendadas</h2>
          <div class="grid grid-cols-1 gap-y-10 gap-x-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <!-- RECOMMENDED RECIPES -->
            <?php
            require_once("../models/Receita.php");
            require_once("../models/ReceitaIngrediente.php");
            require_once("../utils/recommended.php");
            $html = load_recomended_recipes();

            echo $html;


            ?>
          </div>
        </div>
      </div>
    </main>

    
<?php
include_once("./layouts/footer.php")
?>
