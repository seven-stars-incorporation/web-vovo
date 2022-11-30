<?php 

if (isset($_GET["recipes"])) {
  $recipes_favs = $_GET['recipes'];
  setcookie("recipes_favs", $recipes_favs, time() + (10 * 365 * 24 * 60 * 60), '/' );
  header('location: index.php');
}
include_once("./layouts/header.php");
?>


<main>
    <div class="flex flex-col relative">
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
          <!-- <div class="group relative receita">
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
            botao de favoritar 
            <div class="favorite">
              <button class="flex items-center justify-center h-9 w-9 bg-[#ffcc33] hover:bg-[#98dede] rounded-sm text-zinc-900 z-10 border-none translate-x-[2px] -translate-y-[2px] hover:translate-x-1 hover:-translate-y-1 transition-all duration-150 ease-out" title="Adicionar aos favoritos">
                <span class="sr-only">Adicionar aos favoritos</span>
                <i class="ph-bookmark-simple-fill text-xl"></i>
              </button>
              <div class="absolute w-full h-full bg-zinc-900 rounded-sm"></div>
            </div>
          </div> -->
          <!-- fim item-receita -->

          <?php
            $category = @$_GET['categoria'];
            $html = load_recomended_recipes();
            $text = 'Receitas recomendadas';

            if ($category != '' && $category != 'recomendados'){
              $text = $category;
              $html = load_by_category($category);
            }
            echo $html;
          ?>

          <!-- mais receitas aqui... -->
        </div>
      </div>
    </div>
  </main>


<?php include_once("./layouts/footer.php"); ?>