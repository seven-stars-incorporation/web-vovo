const searchForm = document.getElementById("search-form");
const buttonSearch = document.getElementById("send-search");
const suggetionsContainer = document.getElementById("suggetionsContainer");
const search = document.getElementById('search');
const tagContainer = document.getElementById('tag-container');
const listRecipeNames = document.getElementsByName('list-recipe-names')[0];
var data = [];

read_json().then(value => {
  data = value;
})

buttonSearch.onclick = () => {
  if (tagContainer.childElementCount === 0) {
    searchForm.preventDefault();
  }
}

var result = [];
var resultRecipe = [];

search.onkeyup = () => {
  /*let containIngredient = ingredientesOBJ.some(item => item['nomeIngrediente'].split(' ').includes(valInput) && valInput.length > 2);

  if(containIngredient){
    ingredientname.innerText = search .value;
    suggestionList.classList.remove("hidden");
  }else {
    ingredientname.innerText = '';
    suggestionList.classList.add("hidden");
  }*/
  result = [];
  resultRecipe = [];
  let html = '';

  receitasOBJ.filter(recipeFilter);
  resultRecipe = resultRecipe.filter((arr, index, self) =>
      index === self.findIndex((t) => (t.idReceita === arr.idReceita || t.nomeReceita === arr.nomeReceita)))
  resultRecipe.forEach(item => {
    html += `
    <div class="flex relative h-full w-full">
        <li onclick="goToRecipe('${item["idReceita"]}')" class="flex w-full justify-between bg-white hover:bg-[#98dede] p-2 rounded-sm cursor-pointer duration-200 text-zinc-900 z-10 border-b border-zinc-300 hover:border-b-transparent hover:translate-x-1 hover:-translate-y-1 transition-all ease-out" title="Clique para adicionar os ingredientes">
          <div class="flex gap-4 items-center">
            <i class="ph-plus-bold text-lg"></i>
            <span id="ingredient-name">${item["nomeReceita"]}</span>
          </div>
          <span class="add">Ir Para Receita</span>
        </li>
        <div class="absolute w-full h-full bg-zinc-900 rounded-sm border-white border-2"></div>
      </div>
    `;
  });

  ingredientesOBJ.filter(filterIngredient);
  result = [...new Set(result)];

  result.forEach(item => {
    html += `
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
    `;
  });

  suggetionsContainer.innerHTML = html;

}

function recipeFilter(recipe) {
  let valInput = search.value;
  let recipeName = String(recipe['nomeReceita']).toLowerCase();

  const re = new RegExp(valInput + '[a-zà-ÿ ]*', 'i')
  let match = recipeName.match(re)

  if (match != null && valInput.length > 2) {
    suggestionList.classList.remove("hidden");
    console.log(valInput, match, re)

    resultRecipe.push({"nomeReceita": match[0], "idReceita" : recipe['idReceita']});
  }
}

function goToRecipe(idRecipe){
  window.location.href = `./detalhes-receita.php?id=${idRecipe}`;
}

function filterIngredient(ingredient) {
  let valInput = search.value;
  let ingredientName = String(ingredient['nomeIngrediente']).toLowerCase();
  const re = new RegExp(valInput + '[a-zà-ÿ]*', 'i')
  let match = ingredientName.match(re)


  if (match != null && valInput.length > 2) {
    suggestionList.classList.remove("hidden");
    console.log(valInput, match, re)
    tempSplitName = match[0].split(' ')//.slice(0,1);

    tempSplitName = tempSplitName.filter((item) => {
      return !data.includes(item);
    })

    ingredientName = tempSplitName.join(' ');
    ingredientName = ingredientName.endsWith('s') ? ingredientName.substring(0, ingredientName.length -1) : ingredientName;
    if (ingredientName.length > 0) {
      result.push(ingredientName.trim());
    }

  }
}

async function read_json() {
  const res = await fetch("../utils/IgnoredWords.json");
  const data = await res.json();
  return data;
}

function addTag(name) {
  let id = 'tag-' + tagContainer.childElementCount + 1;
  tagContainer.innerHTML += `<div id="${id}" class="bg-[#ffed9f] inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden">
  <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs px-1" x-text="tag">${name}</span>
  <button type="button" onclick="removeItem('${id}')" class="w-6 h-8 inline-block align-middle hover:bg-[#ffd148] transition-colors duration-200 ease-out focus:outline-none">
    <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path fill-rule="evenodd"
        d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
    </svg>
  </button>
</div>`;


  listRecipeNames.value += name + ',';
  search.value = '';
  suggetionsContainer.innerHTML = '';

}

function removeItem(id) {
  let element = document.getElementById(id);
  listRecipeNames.value = listRecipeNames.value.replace(element.innerText + ',', '');
  tagContainer.removeChild(element);
}