console.log("thiago gay") // QUAL FOI

const searchForm = document.getElementById("search-form");
const searchInput = document.getElementById("search-input");
const buttonSearch = document.getElementById("send-search");
const suggestionList = document.getElementById("suggetions-list")

searchInput.addEventListener("keyup", event => {
  if (event.target.value !== "") {
    suggestionList.classList.remove("hidden");
  } else {
    suggestionList.classList.add("hidden")
  }
})

searchForm.addEventListener("click", event => {
    event.preventDefault();
})

