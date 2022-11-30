<?php
# LOAD PREFS
if (isset($_GET["recipes"])) {
  $recipes_favs = $_GET['recipes'];
  //$categories_favs = $_GET['categories'];
  setcookie("recipes_favs", $recipes_favs, time() + (10 * 365 * 24 * 60 * 60), '/' );
  //setcookie("categories_favs", $categories_favs, time() + (10 * 365 * 24 * 60 * 60), '/');
  header('location: index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  

  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://unpkg.com/phosphor-icons"></script>
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

    <form class="max-w-5xl w-full mx-auto px-4 sm:px-8 mt-10 z-10" action="resultados.php" method="POST" id="search-form">
      <label class="bg-gray-50 flex rounded-2xl border-t border-gray-100 shadow-md pl-4 gap-3" for="search-input">
        <img src="./images/icons/search.svg" alt="Icone de pesquisa">
        <input type="hidden" name="list-recipe-names">
        <input class="py-3 w-full focus:outline-none bg-gray-50" type="search" name="search-input" id="search-input" placeholder="Busque sua receita" autocomplete="off">
        <button class="bg-[#fa6163] hover:bg-red-500 text-white px-4 rounded-tr-2xl rounded-br-2xl" type="submit" id="send-search" name="send-search">Pesquisar</button>
      </label>

      <!-- sugestões -->
      <div class="relative">
        <ul class="absolute top-1 hidden w-full max-w-2xl bg-white rounded-xl max-h-[600px] py-3 px-2 z-10" id="suggetions-list">
          <!--<li id='add-tag-button' class="flex justify-between bg-white hover:bg-red-100 p-2 rounded-lg cursor-pointer transition-colors duration-150">
            <div class="flex gap-4">
              <img src="./images/icons/add.svg" alt="Icone adicionar">
              <span id="ingredient-name">Nome do ingrediente</span>
            </div>
            <span class="add">Adicionar</span>
          </li>-->

          
        </ul>
      </div>


      <!-- tags -->
      <!-- logica:
        pra cada sugestão que o usuario clicar cria um item abaixo com javascript com o nome da sugestão,
        ja no php acho que insere num array sla
      -->
      <div class="p-2 mb-6" id="tag-container">
        
      </div>
    </form>

    <main class="container mx-auto mt-10 mb-4 px-4 sm:px-8 max-w-[1440px]">
      <div class="mt-10 bg-white rounded-xl shadow-lg">
        <div id="categorias-receitas" class="w-full px-8 py-6 max-w-7xl mx-auto">

          <h2 class="text-2xl font-semibold mb-10 text-zinc-900">Categorias</h2>
          <div class="w-full flex gap-6 overflow-x-scroll overflow-y-hidden sm:overflow-x-hidden scroll-mx-4">
            <a href='index.php?categoria=recomendados' class="inline-flex flex-col justify-start pt-2 pb-6 items-center border border-zinc-300 rounded-full bg-white cat-link">
              <div class="rounded-full flex items-center justify-center p-4 m-2 bg-zinc-100 cat-icon">
                <i class="ph-cooking-pot-fill text-3xl text-amber-500"></i>
              </div>
              <span>Todos</span>
            </a>
            <a href='index.php?categoria=PIZZA' class="inline-flex flex-col justify-start pt-2 pb-6 items-center border border-zinc-300 rounded-full bg-white cat-link">
              <div class="rounded-full flex items-center justify-center p-4 m-2 bg-zinc-100 cat-icon">
                <i class="ph-pizza-fill text-3xl text-amber-500"></i>
              </div>
              <span>Pizza</span>
            </a>
            <a href='index.php?categoria=DRINKS' class="inline-flex flex-col justify-start pt-2 pb-6 items-center border border-zinc-300 rounded-full bg-white cat-link">
              <div class="rounded-full flex items-center justify-center p-4 m-2 bg-zinc-100 cat-icon">
                <i class="ph-brandy-fill text-3xl text-amber-500"></i>
              </div>
              <span>Drinks</span>
            </a>
            <a href='index.php?categoria=PEIXES' class="inline-flex flex-col justify-start pt-2 pb-6 items-center border border-zinc-300 rounded-full bg-white cat-link">
              <div class="rounded-full flex items-center justify-center p-4 m-2 bg-zinc-100 cat-icon">
                <i class="ph-fish-simple-fill text-3xl text-amber-500"></i>
              </div>
              <span>Peixe</span>
            </a>
            <a href='index.php?categoria=PÃES' class="inline-flex flex-col justify-start pt-2 pb-6 items-center border border-zinc-300 rounded-full bg-white cat-link">
              <div class="rounded-full flex items-center justify-center p-4 m-2 bg-zinc-100 cat-icon">
                <box-icon 
                  name="baguette"
                  color="#f59e0b"
                  width="32"
                  height="32"
                  type="solid"
                  class="w-7 h-7"
                >
                </box-icon>
              </div>
              <span>Pães</span>
            </a>
          
            <a href='index.php?categoria=SOPAS' class="inline-flex flex-col justify-start pt-2 pb-6 items-center border border-zinc-300 rounded-full bg-white cat-link">
              <div class="rounded-full flex items-center justify-center p-4 m-2 bg-zinc-100 cat-icon">
              <box-icon
                name='bowl-hot' 
                color="#f59e0b"
                width="32"
                height="32"
                type="solid"
                class="w-7 h-7">
              </box-icon>
              </div>
              <span>Sopas</span>
            </a>
            <a href='index.php?categoria=BOLOS DE LIQUIDIFICADOR' class="inline-flex flex-col justify-start pt-2 pb-6 items-center border border-zinc-300 rounded-full bg-white cat-link">
              <div class="rounded-full flex items-center justify-center p-4 m-2 bg-zinc-100 cat-icon">
              <box-icon 
                type='solid' 
                name='cake'
                color="#f59e0b"
                width="32"
                height="32"
                type="solid"
                class="w-7 h-7">
              </box-icon>
              </div>
              <span>Bolos</span>
            </a>
          </div>
        </div>

        <?php
            $category = @$_GET['categoria'];

            require_once("../models/Receita.php");
            require_once("../models/ReceitaIngrediente.php");
            require_once("../utils/recommended.php");

            $html = load_recomended_recipes();

            $text = 'Receitas recomendadas';

            if ($category != '' && $category != 'recomendados'){
              $text = $category;
              $html = load_by_category($category);
            }
        ?>

        <div class="mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
          <h2 class="text-4xl font-semibold mb-10 text-zinc-900"><?php echo $text; ?></h2>
          <div class="grid grid-cols-1 gap-y-10 gap-x-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <!-- RECOMMENDED RECIPES -->
            <?php

            echo $html;


            ?>
          </div>
        </div>
      </div>
    </main>

    <footer class="w-full bg-[#fa6163]">
      <div class="container mx-auto mt-10 py-6">
        <div class="flex flex-col items-center">
          <img class="w-12 h-12 rounded-full my-4" src="./images/logo.png" alt="" />
          <p>&copy; 2022 Dicas da vovó, Seven Stars.</p>
        </div>
      </div>
    </footer>
  </div>

</body>


</html>