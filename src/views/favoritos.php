<?php

  require_once("../models/ReceitaIngrediente.php");
  $recipes = array();


  $infos = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://192.168.0.101:8080/web-vovo/src/views/index.php';

  if (isset($_COOKIE["recipes_favs"]) || isset($_COOKIE["categories_favs"])){
    $idsRecipes = explode(',', $_COOKIE["recipes_favs"]);
    
    array_pop($idsRecipes);
    
    $receitaIngrediente = new ReceitaIngrediente();
    
    foreach($idsRecipes as $idRecipe){
      $recipes[] = $receitaIngrediente->searchRecipeWithId($idRecipe);
    }

    $infos = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://192.168.0.101:8080/web-vovo/src/views/index.php?recipes={$_COOKIE["recipes_favs"]}";

  }

  
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./css/styles.css" rel="stylesheet" />
  <script>
  <?php
  require_once("../models/Ingrediente.php");

  $ingredienteClass = new Ingrediente();
  $listIngrediente  = $ingredienteClass->listar();
  $json = json_encode($listIngrediente);
  ?>

  const ingredientesOBJ = <?php echo ($json); ?>;
  </script>
  <script defer src="./js/app.js"></script>
</head>

<body>
  <div>
    <header class="flex items-center w-full bg-white shadow-md sticky inset-0 z-20">
      <nav class="flex px-4 py-6 justify-between max-w-[1440px] w-full mx-auto">
        <button class="inline-flex md:hidden items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-400">
          <img class="" src="./images/icons/menu-line.svg" alt="Icone menu hamburguer" />
        </button>

        <div class="flex items-center justify-center">
          <a class="text-2xl font-semibold" href="index.php">
            Dicas da Vovo
          </a>
        </div>

        
        <div class="hidden md:flex items-center text-zinc-900">
          <a class="underline-offset-8 underline text-lg" href="./">Início</a>
        </div>

        <a class="p-3 bg-[#fa6163] rounded-xl cursor-pointer" href="./favoritos.php">
          <div class="flex items-center justify-center">
            <span class="text-white">Meus Favoritos</span>
            <img class="ml-2" src="./images/icons/favorites.svg" alt="">
          </div>
        </a>
      </nav>
    </header>

    <div class="container mx-auto mt-10 mb-4 px-4 sm:px-8 max-w-[1440px]">
      <div class="mt-6 bg-white rounded-xl shadow-lg py-8">
        <div class="flex items-center justify-center gap-16">
          <div class="flex flex-col items-center justify-center gap-8">
            <img class="max-w-[120px]" src="./images/scan.png" alt="">
            <span class="max-w-xs font-semibold text-xl">Leia o <span class="text-[#fa6163]">QR Code</span> com a câmera do seu celular para importar seus favoritos.</span>
          </div>
          <div class="p-1 bg-gray-100 border border-zinc-500 rounded-md">
            <img src=<?php echo ($infos); ?>&choe=UTF-8 title="Link to Google.com" />
          </div>
        </div>
      </div>
    </div>
    
  <main class="container mx-auto mt-10 mb-4 px-4 sm:px-8 max-w-[1440px]">
    <div class="mt-10 bg-white rounded-xl shadow-lg border-t border-zinc-100">
      <div class="mx-auto py-8 px-4 sm:py-16 sm:px-6 lg:max-w-7xl lg:px-8">
          <h2 class="text-4xl font-semibold mb-10 text-zinc-900">Favoritos</h2>
          <div class="grid grid-cols-1 gap-y-10 gap-x-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <!-- RECOMMENDED RECIPES -->
            <?php
              $html = "";

              foreach($recipes as $recipe){
                $recipe = $recipe[0];
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
