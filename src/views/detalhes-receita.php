<?php
include_once("./layouts/header.php")
?>
  <main class="container mx-auto mt-10 mb-4 px-4 sm:px-8 max-w-[1440px]">
    <div class="mt-10 bg-white rounded-xl shadow-lg">
      <div class="mx-auto py-8 px-4 sm:py-16 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="flex flex-col">
          <div class="flex flex-col-reverse lg:flex-row gap-16">
            <!-- img e botao -->
            <div class="flex flex-col max-w-xl md:max-w-2xl mx-auto lg:max-w-lg gap-3 lg:gap-5">
              <div>
                <img class="rounded-lg" src="../assets/images/receitas/hamburguer.jpg" alt="">
              </div>

              <div class="flex w-full items-center justify-between">
                <div class="text-base lg:text-lg">
                  <span class="text-zinc-900">Custo aproximado:</span>
                  <span class="font-medium">R$ 14,99</span>
                </div>
                <button class="inline-flex items-center justify-center gap-4 h-12 max-w-[128px] py-2 px-4 bg-[#fa6163] rounded-xl">
                  <div class="flex items-center justify-center">
                    <span class="text-white">Favoritar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M5 2h14a1 1 0 0 1 1 1v19.143a.5.5 0 0 1-.766.424L12 18.03l-7.234 4.536A.5.5 0 0 1 4 22.143V3a1 1 0 0 1 1-1zm13 2H6v15.432l6-3.761 6 3.761V4z" 
                    fill="rgba(255,255,255,1)"/></svg>
                  </div>
                </button>
              </div>
            </div>

            <!-- descricao meu pau na sua mao -->
            <div class="flex flex-col">
              <h2 class="text-2xl font-bold text-zinc-900">HAMBURGUER FODA COM MOLHO E BATATA FRITA CROCANTE</h2>
              <p class="mt-8 text-base sm:text-xl">Coloca a cerveja para gelar que vai ter frango à passarinho! Esta receita é preparada na AirFryer, ou seja, sem sujeira na cozinha. Perfeito.</p>
            </div>
          </div>

          <div class="grid grid-cols-2 mt-10 gap-4">
            <!-- ingredientes -->
            <div class="border-t border-solid border-zinc-400 col-span-2 lg:col-span-1 lg:max-w-lg max-w-none">
              <ul class="mt-6 lg:mt-8">
                <h2 class="uppercase text-2xl font-semibold my-4 inline-flex items-center">INGREDIENTES</h2>
                <li class="list-disc ml-4 my-2 text-base md:text-lg break-words">¼ de xícara (chá) de farinha de trigo</li>
                <li class="list-disc ml-4 my-2 text-base md:text-lg break-words">¼ de xícara (aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaachá) de farinha de trigo</li>
                <li class="list-disc ml-4 my-2 text-base md:text-lg break-words">¼ de xícara (chá) de farinha de trigo</li>
                <li class="list-disc ml-4 my-2 text-base md:text-lg break-words">¼ de xícara (chá) de farinha de trigo</li>
              </ul>
            </div>
  
            <!-- modo de preparo -->
            <div class="border-t border-solid border-zinc-400 col-span-2 lg:col-span-1">
              <ol class="mt-6 lg:mt-8">
                <h2 class="uppercase text-2xl font-semibold my-4">MODO DE PREPARO</h2>
                <li class="list-decimal ml-5 my-2 text-base md:text-lg break-words">
                  Numa tigela grande, coloque o frango e tempere com a páprica, o sal e a pimenta. Junte o alho, a salsinha e misture bem para envolver todos os pedaços. Deixe descansar por 15 minutos em temperatura ambiente — assim o frango perde o gelo e absorve os sabores da marinada
                </li>
              </ol>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>
<?php
include_once("./layouts/footer.php")
?>
