const searchForm = document.getElementById("search-form");
const buttonSearch = document.getElementById("send-search");
const suggestionList = document.getElementById("suggetions-list")
const search = document.getElementById('search-input');
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
  ingredientesOBJ.filter(filter);
  result = [...new Set(result)];
  html = '';
  result.forEach(item => {
    html += `
    <li onclick="addTag('${item}')" class="flex justify-between bg-white hover:bg-red-100 p-2 rounded-lg cursor-pointer transition-colors duration-150">
      <div class="flex gap-4">
        <img src="./images/icons/add.svg" alt="Icone adicionar">
        <span id="ingredient-name">${item}</span>
      </div>
      <span class="add">Adicionar</span>
    </li>
    `;
  });

  suggestionList.innerHTML = html;

}

function filter(ingredient) {
  let valInput = search.value;
  let ingredientName = String(ingredient['nomeIngrediente']).toLowerCase();
  const re = new RegExp(valInput + '[a-zà-ÿ]*', 'i')
  match = ingredientName.match(re)


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
  tagContainer.innerHTML += `<div id="${id}" class="bg-red-100 inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden">
  <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs px-1 text-zinc-800" x-text="tag">
    ${name}
  </span>
  <a onclick="removeItem('${id}')" class="inline-flex items-center justify-center cursor-pointer w-7 h-8 align-middle text-zinc-800 bg-red-200 hover:bg-red-300 focus:outline-none shadow-md hover:shadow-none">
  <svg class="w-6 h-6 fill-zinc-600 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/>
  </svg>
  </a>
  </div>`;

  listRecipeNames.value += name + ',';
  search.value = '';
  suggestionList.classList.add("hidden");

}

function removeItem(id) {
  let element = document.getElementById(id);
  listRecipeNames.value = listRecipeNames.value.replace(element.innerText + ',', '');
  tagContainer.removeChild(element);
}