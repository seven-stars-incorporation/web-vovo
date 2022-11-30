// splash screen
// function loader() {
//   document.querySelector("#loader").classList.add("fade-out");
// }

// function byLoarder() {
//   document.querySelector("#loader").classList.add("hidden")
// }

// function fadeOut() {
//   setInterval(loader, 2500);
//   setInterval(byLoarder, 2600);
// }

// window.onload = fadeOut;



let suggestionList = document.querySelector("#suggestion-list")
let inputSearch = document.querySelector("#search")

// verifica se a lista ultrapassou a altura maxima
// se for verdadeiro aplica um scroll na lista
function listScroll() {
  let maxHeight = 384;

  suggestionList.clientHeight > maxHeight 
  ? suggestionList.classList.add("overflow-y-scroll")
  : suggestionList.classList.remove("overflow-y-scroll") 
}

// só pra testar se a função ta funcionando
inputSearch.addEventListener("keyup", listScroll)
inputSearch.onfocus = ()=>{
  suggestionList.classList.remove('hidden');
}