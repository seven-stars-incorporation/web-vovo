<?php
  # LOAD PREFS
  if (isset($_GET["sharing"])){
    $recipes_favs = $_GET['recipes'];
    $categories_favs = $_GET['categories'];
    setcookie("recipes_favs", $recipes_favs, time() + (10 * 365 * 24 * 60 * 60));
    setcookie("categories_favs", $categories_favs, time() + (10 * 365 * 24 * 60 * 60));
    header('location: index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./css/styles.css" rel="stylesheet" />
  <script defer src="./js/app.js"></script>
</head>
<body>
  <div>
    <header class="flex items-center w-full bg-white shadow-md sticky inset-0 z-20">
      <nav class="flex px-4 py-6 justify-between max-w-[1440px] w-full mx-auto">
        <button class="inline-flex sm:hidden items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-400">
          <img class="" src="./images/icons/menu-line.svg" alt="Icone menu hamburguer" />
        </button>

        <div class="flex items-center justify-center">
          <a href="#">
            <span>dicas da vovo</span>
          </a>
        </div>

        <button class="p-3 bg-[#fa6163] rounded-xl">
          <div class="flex items-center justify-center">
            <span class="text-white">Favoritos</span>
            <img src="./images/icons/favorites.svg" alt="">
          </div>
        </button>
      </nav>
    </header>

    <form class="max-w-5xl w-full mx-auto px-4 sm:px-8 mt-10" action="" method="" id="search-form">
      <label class="bg-gray-50 flex rounded-2xl border-t border-gray-100 shadow-md pl-4 gap-3" for="search-input">
        <img src="./images/icons/search.svg" alt="Icone de pesquisa">
        <input 
          class="py-3 w-full focus:outline-none bg-gray-50"
          type="search" name="search-input" id="search-input" placeholder="Busque sua receita" autocomplete="off"
        >
        <button class="bg-[#fa6163] hover:bg-red-500 text-white px-4 rounded-tr-2xl rounded-br-2xl" type="submit" id="send-search" name="send-search">Pesquisar</button>
      </label>
      
      <!-- sugestões -->
      <div class="relative">
        <ul class="absolute top-1 hidden w-full max-w-2xl bg-white rounded-xl max-h-[600px] py-3 px-2" id="suggetions-list">
          <li class="flex justify-between bg-white hover:bg-red-100 p-2 rounded-lg cursor-pointer transition-colors duration-150">
            <div class="flex gap-4">
              <img src="./images/icons/add.svg" alt="Icone adicionar">
              <span>Nome do ingrediente</span>
            </div>
            <span class="add">Adicionar</span>
          </li>
        </ul>
      </div>


      <!-- tags -->
      <!-- logica:
        pra cada sugestão que o usuario clicar cria um item abaixo com javascript com o nome da sugestão,
        ja no php acho que insere num array sla
      -->
      <div class="p-2 mb-6">
        <div class="bg-red-100 inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden">
          <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs px-1 text-zinc-800" x-text="tag">ovo</span>
          <a class="inline-flex items-center justify-center cursor-pointer w-7 h-8 align-middle text-zinc-800 bg-red-200 hover:bg-red-300 focus:outline-none shadow-md hover:shadow-none">
            <svg class="w-6 h-6 fill-zinc-600 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg>
          </a>
        </div>
      </div>
    </form>

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
<script>
  <?php
  require_once("../models/Ingrediente.php");

  $ingredienteClass = new Ingrediente();
  $listIngrediente  = $ingredienteClass->listar();
  $json = json_encode($listIngrediente);
  ?>

  const ingredientesOBJ = <?php echo($json); ?>;
  var search = document.getElementById('search-input');

  search.onkeyup = ()=>
  {    
    valInput = search.value;
    console.log(ingredientesOBJ.some(item => (item['nomeIngrediente'].split(valInput.toLowerCase()).length -1) > ));
    //ingredientesOBJ.filter(nameFilter);
    // se der conflito tu tira o script la do app, ele ta verificando se tem sexo no input p´ra poder mostrar as sugestoes
  }

  function nameFilter(ingrediente) 
  {
    let name = ingrediente['nomeIngrediente'].toLowerCase();
    let occurrences = name.split(valInput.toLowerCase()).length -1;
    if(occurrences === 1 && occurrences > 0 && valInput.length > 1)
    {
      
    }

  }



  </script>
</html>
