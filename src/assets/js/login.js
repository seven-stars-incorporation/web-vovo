// revela e oculta a senha
const showPassword = document.getElementById("show-password");
const inputPassword = document.querySelector("#senha");
const inputUsername = document.querySelector("#usuario");

showPassword.onclick = () => {
  if (inputPassword.type === "password") {
    inputPassword.type = "text";
    showPassword.innerHTML = "Ocultar";
  } else {
    inputPassword.type = "password";
    showPassword.innerHTML = "Mostrar";
  }
};

// const buttonSignIn = document.getElementById("sign-in");
// buttonSignIn.addEventListener("click", (e) => {
//   //e.preventDefault()
// });