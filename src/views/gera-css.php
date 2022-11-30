<?php include_once("./layouts/header.php"); ?>

<main>
    <div class="flex flex-col relative shadow-md">
      <!-- porra toda -->
      <div class="mx-auto max-w-2xl bg-white py-16 px-6 sm:py-24 sm:px-6 lg:max-w-[1440px] lg:px-8 shadow-md">

        <!-- categorias -->
        <?php include_once("./layouts/categorias.php")?>
        <!-- fim categorias -->

        <div class="mt-20">
          <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-900">Receitas recomendadas</h2>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

          <!-- item-receita -->
          <div class="group relative receita">
            <div class="w-full overflow-hidden rounded-md bg-zinc-200 transition-opacity duration-300 group-hover:opacity-80 lg:aspect-none h-48">
              <img src="images/hamburguer.jpg" class="h-full w-full object-cover object-center lg:h-full lg:w-full" loading="lazy">
            </div>
            <div class="mt-4 flex justify-between">
              <div>
                <h3 class="text-zinc-900 font-medium">
                  <a href="#">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    Hamburguer com batata frita
                  </a>
                </h3>
                <p class="text-sm font-medium text-zinc-700">Custo aproximado: <span class="">R$35</span></p>
              </div>
            </div>
            <!-- botao de favoritar -->
            <div class="favorite">
              <button class="flex items-center justify-center h-9 w-9 bg-[#ffcc33] hover:bg-[#98dede] rounded-sm text-zinc-900 z-10 border-none translate-x-[2px] -translate-y-[2px] hover:translate-x-1 hover:-translate-y-1 transition-all duration-150 ease-out" title="Adicionar aos favoritos">
                <span class="sr-only">Adicionar aos favoritos</span>
                <i class="ph-bookmark-simple-fill text-xl"></i>
              </button>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm"></div>
            </div>
          </div>
          <!-- fim item-receita -->

          <!-- mais receitas aqui... -->
        </div>
      </div>
    </div>
  </main>


<?php include_once("./layouts/footer.php"); ?>

<section id="categorias">
          <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-900 my-6">Categorias</h2>
          <ul class="flex gap-3 flex-wrap mx-auto" id="lista-de-categorias">
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Alimentação%Saudável" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Alimentação Saudável</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Bebidas</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Bolos e Tortas Doces</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Carnes</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Doces e Sobremesas</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Lanches</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Light</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Massas</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Peixes e Frutos do Mar</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Prato único</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Saladas, Molhos e Acompanhamentos</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
            <div class="flex relative h-full max-w-xs">
              <a href="index.php?categoria=Aves" class="category-link" title="Clique para adicionar os ingredientes">
                <span class="link">Sopas</span>
              </a>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>
          </ul>
        </section>

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
  <script defer src="./js/main.js"></script>
  <script defer src="./js/carousel.js"></script>
</head>
<body>
  <header class="bg-white border-b border-zinc-200 py-4 sticky inset-0 z-50">
    <nav class="max-w-[1440px] flex mx-auto py-2 justify-between px-4 items-center gap-2">
      <a class="logo" href="./">
        <div class="hidden lg:block">
          <img src="./images/isdarova.svg" class="w-40">
        </div>

        <div class="block lg:hidden">
          <img src="./images/mark.svg" class="w-12 sm:w-16">
        </div>
      </a>

      <form class="w-full max-w-[240px] sm:max-w-sm md:max-w-md lg:max-w-xl xl:max-w-3xl" action="" method="POST">
        <div class="relative flex w-full h-full">
          <label for="search" class="flex items-center w-full h-full">
            <input 
              class="input-search outline-none w-full h-full border-2 border-solid border-zinc-900 border-r-0 px-4 py-3 bg-white z-10 rounded-sm transition-transform duration-300 translate-x-[2px]"
              type="search" 
              name="search" 
              id="search" 
              placeholder="Pesquise receitar pelo nome, ingredientes e etc..."
              required
            >
          </label>
          <div class="relative h-full flex">
            <button class="btn-primary" type="submit">
              <i class="ph-magnifying-glass-bold text-2xl"></i>
              <span class="hidden md:block">Pesquisar</span>
            </button>
            <div class="absolute w-full h-full bg-zinc-900 rounded-sm"></div>
          </div>

          <ul class="absolute z-[100] top-12 left-1 w-full max-w-lg xl:max-w-2xl bg-white p-2 border border-zinc-200 max-h-96 overflow-x-hidden flex flex-col gap-1" id="suggestion-list">

            <ul class="text-zinc-900 border-b border-zinc-300 pb-4 pt-1 mb-2">
              <span class="uppercase text-sm font-medium">Lista de ingredientes</span>
              <div class="tags">
                <div class="bg-[#ffed9f] inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden">
                  <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs px-1" x-text="tag">tag</span>
                  <button class="w-6 h-8 inline-block align-middle hover:bg-[#ffd148] transition-colors duration-200 ease-out focus:outline-none">
                    <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                      <path fill-rule="evenodd"
                        d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                    </svg>
                  </button>
                </div>
                
              </div>
            </ul>

            <div class="flex relative h-full w-full">
              <li onclick="addTag('${item}')" class="flex w-full justify-between bg-white hover:bg-[#98dede] p-2 rounded-sm cursor-pointer duration-200 text-zinc-900 z-10 border-b border-zinc-300 hover:border-b-transparent hover:translate-x-1 hover:-translate-y-1 transition-all ease-out" title="Clique para adicionar os ingredientes">
                <div class="flex gap-4 items-center">
                  <i class="ph-plus-bold text-lg"></i>
                  <span id="ingredient-name">${item}</span>
                </div>
                <span class="add">Adicionar</span>
              </li>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
            </div>

            <div class="flex relative h-full w-full">
              <li onclick="addTag('${item}')" class="flex w-full justify-between bg-white hover:bg-[#98dede] p-2 rounded-sm cursor-pointer duration-200 text-zinc-900 z-10 border-b border-zinc-300 hover:border-b-transparent hover:translate-x-1 hover:-translate-y-1 transition-all ease-out" title="Clique para adicionar os ingredientes">
                <div class="flex gap-4 items-center">
                  <i class="ph-plus-bold text-lg"></i>
                  <span id="ingredient-name">${item}</span>
                </div>
                <span class="add">Adicionar</span>
              </li>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
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