<?php
  require_once("../models/Ingrediente.php");
  require_once("../utils/recommended.php");
  require_once("../models/Receita.php");
  require_once("../models/ReceitaIngrediente.php");

  $ingredienteClass = new Ingrediente();
  $listIngrediente  = $ingredienteClass->listar();
  $json = json_encode($listIngrediente);
  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- stylesheets -->
  <link href="./css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/carousel.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

  <!-- scripts -->
  <script src="https://unpkg.com/phosphor-icons"></script>
  <script defer src="./js/app.js"></script>
  <script defer src="./js/main.js"></script>
  <script defer src="./js/carousel.js"></script>
  <script>const ingredientesOBJ = <?php echo ($json); ?>;</script>
</head>
<body>
  <header class="bg-white border-b border-zinc-200 py-4 sticky inset-0 z-50">
    <nav class="max-w-[1440px] flex mx-auto py-2 justify-between px-4 items-center gap-2">
      <a class="logo" href="./">
        <div class="hidden lg:block">
          <img src="./images/logo.svg" class="w-40">
        </div>

        <div class="block lg:hidden">
          <img src="./images/mark.svg" class="w-12 sm:w-16">
        </div>
      </a>

      <form class="w-full max-w-[240px] sm:max-w-sm md:max-w-md lg:max-w-xl xl:max-w-3xl" action="./resultados.php" method="POST">
        <div class="relative flex w-full h-full">
        <input type="hidden" name="list-recipe-names">
          <label for="search" class="flex items-center w-full h-full">
            <input 
              class="input-search outline-none w-full h-full border-2 border-solid border-zinc-900 border-r-0 px-4 py-3 bg-white z-10 rounded-sm transition-transform duration-300 translate-x-[2px]"
              type="search" 
              name="search" 
              id="search" 
              placeholder="Pesquise receitas pelo nome, ingredientes e etc..."
            >
          </label>
          <div class="relative h-full flex">
            <button id="send-search" class="btn-primary" type="submit">
              <i class="ph-magnifying-glass-bold text-2xl"></i>
              <span class="hidden md:block">Pesquisar</span>
            </button>
            <div class="absolute w-full h-full bg-zinc-900 rounded-sm"></div>
          </div>

          <ul class="absolute z-[100] top-12 left-1 w-full max-w-lg xl:max-w-2xl bg-white p-2 border border-zinc-200 max-h-96 overflow-x-hidden flex flex-col gap-1 hidden" id="suggestion-list">

            <ul class="text-zinc-900 border-b border-zinc-300 pb-4 pt-1 mb-2">
              <span class="uppercase text-sm font-medium">Lista de ingredientes</span>
              <div class="tags" id="tag-container">
                <!-- <div class="bg-[#ffed9f] inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden">
                  <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs px-1" x-text="tag">tag</span>
                  <button class="w-6 h-8 inline-block align-middle hover:bg-[#ffd148] transition-colors duration-200 ease-out focus:outline-none">
                    <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path fill-rule="evenodd"
                        d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                    </svg>
                  </button>
                </div> -->
                
              </div>
            </ul>
            <div id="suggetionsContainer">
              <!-- Item da sugestão meu pau na sua mão -->
              <!-- <div class="flex relative h-full w-full">
                <li onclick="addTag('${item}')" class="flex w-full justify-between bg-white hover:bg-[#98dede] p-2 rounded-sm cursor-pointer duration-200 text-zinc-900 z-10 border-b border-zinc-300 hover:border-b-transparent hover:translate-x-1 hover:-translate-y-1 transition-all ease-out" title="Clique para adicionar os ingredientes">
                  <div class="flex gap-4 items-center">
                    <i class="ph-plus-bold text-lg"></i>
                    <span id="ingredient-name">${item}</span>
                  </div>
                  <span class="add">Adicionar</span>
                </li>
                <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
              </div> -->
            </div>
           

            
            
            <!-- More items -->
          </ul>
        </div>
      </form>

      <div class="relative flex h-full">
        <a class="btn-link"
          href="./favoritos.php">
          <i class="ph-bookmarks-fill text-2xl"></i>
            <span class="hidden md:block">Favoritos</span>
          </a>
          <div class="absolute w-full h-full bg-zinc-900 rounded-sm"></div>
      </div>
    </nav>
  </header>