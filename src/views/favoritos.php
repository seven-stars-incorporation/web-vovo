<?php

  require_once("../models/ReceitaIngrediente.php");
  $recipes = array();
  $HOST = $_SERVER["HTTP_HOST"];
  $SSL = "https"; //MUDAR PARA http NO LOCAL

  $infos = "https://chart.googleapis.com/chart?chs=256x256&cht=qr&chl={$SSL}://{$HOST}/web-vovo/src/views/index.php";

  if (isset($_COOKIE["recipes_favs"]) || isset($_COOKIE["categories_favs"])){
    $idsRecipes = explode(',', $_COOKIE["recipes_favs"]);
    
    array_pop($idsRecipes);
    
    $receitaIngrediente = new ReceitaIngrediente();
    
    foreach($idsRecipes as $idRecipe){
      $recipes[] = $receitaIngrediente->searchRecipeWithId($idRecipe);
    }
    
    $infos = "https://chart.googleapis.com/chart?chs=256x256&cht=qr&chl={$SSL}://{$HOST}/web-vovo/src/views/index.php?recipes={$_COOKIE["recipes_favs"]}";
  }
  ?>

  <?php 
    include_once("./layouts/header.php")
  ?>

    <div class="container mx-auto mt-10 mb-4 px-4 sm:px-8 max-w-[1440px]">
      <div class="mt-6 bg-white rounded-md shadow-md py-8">
        <div class="flex xl:flex-row flex-col items-center justify-evenly gap-16">
          <div class="flex items-center flex-col">
            <img src="./images/banners/livro.png" alt="Livro de receitas" class="w-80 lg:w-96">
            <div class="flex flex-col text-zinc-900 mt-6 break-words px-4">
              <span class="font-extrabold text-xl lg:text-3xl">
                Boas vindas ao seu livro de receitas.
              </span>
              <span class="text-base lg:text-xl">
                Aqui estão todas as suas receitas favoritas.
              </span>
            </div>
          </div>
          <div class="flex flex-col items-center justify-center gap-8">
            <div class="border border-zinc-300 rounded-md">
              <img src=<?php echo ($infos); ?>&choe=UTF-8 title="Leia o QR Code" class="rounded-md w-52 lg:w-64"/>
            </div>
            <span class="max-w-xs font-semibold text-base lg:text-xl text-zinc-900 text-center px-4">Leia o <span class="text-[#ff6300]">QR Code</span> com a câmera do seu celular para importar seus favoritos.</span>
          </div>
        </div>
      </div>
    </div>
    
  <main class="container mx-auto mt-10 mb-4 px-4 sm:px-8 max-w-[1440px]">
    <div class="mt-10 bg-white rounded-xl shadow-md border-t border-zinc-100">
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

                $html .= "<div class='group relative receita'>
                    <div class='w-full overflow-hidden rounded-md bg-zinc-200 transition-opacity duration-300 group-hover:opacity-80 lg:aspect-none h-48'>
                      <img src='{$caminhoImg}' class='h-full w-full object-cover object-center lg:h-full lg:w-full' loading='lazy'>
                    </div>
                    <div class='mt-4 flex justify-between'>
                      <div>
                        <h3 class='text-zinc-900 font-medium'>
                          <a href='detalhes-receita.php?id={$recipe['idReceita']}'>
                            <span aria-hidden='true' class='absolute inset-0'></span>
                            {$recipe['nomeReceita']}
                          </a>
                        </h3>
                        <p class='text-sm font-medium text-zinc-700'>Custo aproximado: <span class=''>R\${$total_price}</span></p>
                      </div>
                    </div>
                    
                  </div>";

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
