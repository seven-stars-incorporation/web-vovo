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

foreach($listLikeName[0] as $id) {
  $id = $id['idIngrediente'];
  $temp_recipe = $receitaIngrediente->listarPIngrediente($id);
  foreach ($temp_recipe as $recet) {
      $redundancy_control[] = $recet["idReceita"];
      $list_recipe[] = $recet;
  }
}

$count_redundancy = array_count_values($redundancy_control);

uasort($count_redundancy, function($a, $b) {
  return $a > $b ? -1 : 1;
});


?>

  <main class="container mx-auto mt-10 mb-4 px-4 sm:px-8 max-w-[1440px]">
      <div class="mt-10 bg-white rounded-xl shadow-lg">

        <div class="mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
          <h2 class="text-4xl font-semibold mb-10 text-zinc-900">Resultados</h2>
          <div class="grid grid-cols-1 gap-y-10 gap-x-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <!-- RECOMMENDED RECIPES -->
            <?php
            $html = "";


            foreach (array_keys($count_redundancy) as $key){
              foreach ($list_recipe as $recipe){
                  if ($recipe["idReceita"] == $key) {
                      // PUT RECIPE IN THE SITE
                      $list_ingredient = $receitaIngrediente->listarIngredientePRecita($recipe["idReceita"]);
                      $total_price = 0;
                      foreach ($list_ingredient as $ingredient){
                          $total_price += floatval($ingredient["valorIngrediente"]);
                      }

                      $default_path_img = explode('?', $recipe["caminhoImg"])[0];
                      $default_path_img = $default_path_img == "https://img.itdg.com.br/tdg/assets/default/recipe_original.png" ? "images/logo.png" : $default_path_img;
                      $img_options = "?mode=crop&width=710&height=400";
              
                      $caminhoImg = $default_path_img.$img_options;

                      $total_price = str_replace('.', ',', number_format($total_price, 2));

                      $html .= "
                        <a href='detalhes-receita.php?id={$recipe["idReceita"]}' class='group'>
                        <div
                            class='aspect-w-1 aspect-h-1 bg-gray-200 xl:aspect-w-7 xl:aspect-h-8 w-full overflow-hidden rounded-lg'>
                            <img src='{$caminhoImg}'
                            alt='{$recipe["nomeReceita"]}'
                            class='h-full w-full object-cover object-center group-hover:opacity-75' />
                        </div>
                        <h3 class='text-gray-700 mt-4 text-sm'>{$recipe["nomeReceita"]}</h3>
                        <h3 class='text-gray-700 text-sm'><b>{$recipe["descCategoria"]}</b></h3>
                        <p class='text-gray-900 mt-1 text-lg font-medium'>R\${$total_price}</p>
                        </a>
                      ";
                      break;
                  }
              }
            }


            echo $html;


            ?>
          </div>
        </div>
      </div>
    </main>
<?php
include_once("./layouts/footer.php")
?>


