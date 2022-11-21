console.log("thiago gay") // QUAL FOI

const searchForm = document.getElementById("search-form");
const buttonSearch = document.getElementById("send-search");
const suggestionList = document.getElementById("suggetions-list")

searchForm.addEventListener("click", event => {
    event.preventDefault();
})

const search = document.getElementById('search-input');
const ingredientname = document.getElementById('ingredient-name');
const addTagButton = document.getElementById('add-tag-button');
const tagContainer = document.getElementById('tag-container');
const listRecipeNames = document.getElementsByName('list-recipe-names')[0];

search.onkeyup = () => {
  valInput = search.value;
  let containIngredient = ingredientesOBJ.some(item => item['nomeIngrediente'].split(' ').includes(valInput) && valInput.length > 2);

  if(containIngredient){
    ingredientname.innerText = search.value;
    suggestionList.classList.remove("hidden");
  }else {
    ingredientname.innerText = '';
    suggestionList.classList.add("hidden");
  }

  


  //ingredientesOBJ.filter(nameFilter);
  // se der conflito tu tira o script la do app, ele ta verificando se tem sexo no input p´ra poder mostrar as sugestoes
}

addTagButton.onclick = () => {
  let id = 'tag-'+ tagContainer.childElementCount + 1;
  tagContainer.innerHTML += '<div id="'+ (id) +'" class="bg-red-100 inline-flex items-center text-sm rounded mt-2 mr-1 overflow-hidden">'+
  '<span class="ml-2 mr-1 leading-relaxed truncate max-w-xs px-1 text-zinc-800" x-text="tag">'+
  ingredientname.innerText +
  '</span>'+
  '<a onclick="removeItem(\''+id+'\')" class="inline-flex items-center justify-center cursor-pointer w-7 h-8 align-middle text-zinc-800 bg-red-200 hover:bg-red-300 focus:outline-none shadow-md hover:shadow-none"><svg class="w-6 h-6 fill-zinc-600 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg></a></div>';

  listRecipeNames.value += ingredientname.innerText + ',';
  search.value = '';
  ingredientname.innerText = '';
  suggestionList.classList.add("hidden");
  
}

function removeItem(id){
  let element = document.getElementById(id);
  listRecipeNames.value = listRecipeNames.value.replace(element.innerText + ',', '');
  tagContainer.removeChild(element);
}