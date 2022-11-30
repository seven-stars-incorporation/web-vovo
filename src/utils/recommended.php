<?php
function load_recomended_recipes(){
    $recipe = new Receita();
    $recipe_ingredient = new ReceitaIngrediente();

    #ALIMENTAÇÃO SAUDÁVEL
    $MAX_RECIPE_SHOW = 12;
    $list_recipe = $recipe_ingredient->maisBaratas($MAX_RECIPE_SHOW);

    $html = "";
    
    foreach ($list_recipe as $recipe){
        $list_ingredient = $recipe_ingredient->listarIngredientePRecita($recipe["idReceita"]);
        $total_price = $recipe["soma"];
        

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
        <!-- botao de favoritar -->
        <div class='favorite z-[2]'>
          <a href='../controllers/favoritar.php?id_recipe=\"{$recipe['idReceita']}\"&name_category=\"{$recipe['descCategoria']}\"' class='flex cursor-pointer items-center justify-center h-9 w-9 bg-[#ffcc33] hover:bg-[#98dede] rounded-sm text-zinc-700 z-[5] border-none translate-x-[2px] -translate-y-[2px] hover:translate-x-1 hover:-translate-y-1 transition-all duration-150 ease-out' title='Adicionar aos favoritos'>
            <span class='sr-only'>Adicionar aos favoritos</span>
            <i class='ph-bookmark-simple-fill text-xl'></i>
          </a>
          <div class='absolute w-full h-full bg-zinc-900 rounded-sm'></div>
        </div>
      </div>";

    }

    return $html;
}

function load_by_category($category){
    $recipe = new Receita();
    $recipe_ingredient = new ReceitaIngrediente();
    
    $list_recipe = $recipe->read_with_name($category);
    $MAX_RECIPE_SHOW = min(count($list_recipe), 12);
    $rand_keys = array_rand($list_recipe, $MAX_RECIPE_SHOW);

    $html = "";
    
    foreach ($rand_keys as $key){
        $list_ingredient = $recipe_ingredient->listarIngredientePRecita($list_recipe[$key]["idReceita"]);
        $total_price = 0;
        foreach ($list_ingredient as $ingredient){
            $total_price += floatval($ingredient["valorIngrediente"]);
        }

        $default_path_img = explode('?', $list_recipe[$key]["caminhoImg"])[0];
        $default_path_img = $default_path_img == "https://img.itdg.com.br/tdg/assets/default/recipe_original.png" ? "images/logo.png" : $default_path_img;
        $img_options = "?mode=crop&width=710&height=400";

        $caminhoImg = $default_path_img.$img_options;
        
        $total_price = str_replace('.', ',', number_format($total_price, 2));

        $html .= "<div class='group relative receita'>
        <div class='w-full overflow-hidden rounded-md bg-zinc-200 transition-opacity duration-300 group-hover:opacity-80 lg:aspect-none h-48'>
          <img src='{$caminhoImg}' alt='Front of men&#039;s Basic Tee in black.' class='h-full w-full object-cover object-center lg:h-full lg:w-full' loading='lazy'>
        </div>
        <div class='mt-4 flex justify-between'>
          <div>
            <h3 class='text-zinc-900 font-medium'>
              <a href='detalhes-receita.php?id={$list_recipe[$key]['idReceita']}'>
                <span aria-hidden='true' class='absolute inset-0'></span>
                {$list_recipe[$key]['nomeReceita']}
              </a>
            </h3>
            <p class='text-sm font-medium text-zinc-700'>Custo aproximado: <span class=''>R\${$total_price}</span></p>
          </div>
        </div>
        <!-- botao de favoritar -->
        <div class='favorite'>
          <a href='../controllers/favoritar.php?id_recipe=\"{$list_recipe[$key]['idReceita']}\"&name_category=\"{$list_recipe[$key]['descCategoria']}\"' class='flex cursor-pointer items-center justify-center h-9 w-9 bg-[#ffcc33] hover:bg-[#98dede] rounded-sm text-zinc-700 z-[2] border-none translate-x-[2px] -translate-y-[2px] hover:translate-x-1 hover:-translate-y-1 transition-all duration-150 ease-out' title='Adicionar aos favoritos'>
            <span class='sr-only'>Adicionar aos favoritos</span>
            <i class='ph-bookmark-simple-fill text-xl'></i>
          </a>
          <div class='absolute w-full h-full bg-zinc-900 rounded-sm'></div>
        </div>
      </div>";
    }

    return $html;
}