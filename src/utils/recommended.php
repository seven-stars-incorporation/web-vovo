<?php
function load_recomended_recipes(){
    $recipe = new Receita();
    $recipe_ingredient = new ReceitaIngrediente();

    #ALIMENTAÇÃO SAUDÁVEL

    $category = "BOLOS E TORTAS DOCES";

    if (isset($_COOKIE['categories_favs'])){
        $categories_favs = explode(',', $_COOKIE['categories_favs']);
        array_pop($categories_favs);
        $category = $categories_favs[array_rand($categories_favs, 1)];
        $category = str_replace('"', '', $category);
    }
    
    $list_recipe = $recipe->read_with_name($category);
    $MAX_RECIPE_SHOW = 12;
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

        $html .= "
        <a href='detalhes-receita.php?id={$list_recipe[$key]["idReceita"]}' class='group'>
        <div
            class='aspect-w-1 aspect-h-1 bg-gray-200 xl:aspect-w-7 xl:aspect-h-8 w-full overflow-hidden rounded-lg'>
            <img src='{$caminhoImg}'
            alt='{$list_recipe[$key]["nomeReceita"]}'
            class='h-full w-full object-cover object-center group-hover:opacity-75' />
        </div>
        <h3 class='text-gray-700 mt-4 text-sm'>{$list_recipe[$key]["nomeReceita"]}</h3>
        <p class='text-gray-900 mt-1 text-lg font-medium'>R\${$total_price}</p>
        </a>
        ";
    }

    return $html;
}
