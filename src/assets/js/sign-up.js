const labelName = document.querySelector(
  "div.field:nth-child(2) > label:nth-child(1)"
);
const labelUser = document.querySelector(
  "div.field:nth-child(3) > label:nth-child(1)"
);
const labelEmail = document.querySelector(
  "div.field:nth-child(4) > label:nth-child(1)"
);
const labelPassword = document.querySelector(
  "div.field:nth-child(5) > div:nth-child(1) > label:nth-child(1)"
);
const labelConfirmPassword = document.querySelector(
  "div.field:nth-child(6) > div:nth-child(1) > label:nth-child(1)"
);

const elements = {
  inputs: {
    name: document.querySelector("#nome"),
    user: document.querySelector("#usuario"),
    email: document.querySelector("#email"),
    password: document.querySelector("#senha"),
    confirmPassword: document.querySelector("#confirmar-senha"),
  },
};
const input = elements.inputs;

// feedback messages
const feedbackName = document.querySelector("#feedback-name");
const feedbackUser = document.querySelector("#feedback-user");
const feedbackEmail = document.querySelector("#feedback-email");
const feedbackPassword = document.querySelector("#feedback-password");
const feedbackConfirmPassword = document.querySelector(
  "#feedback-confirm-password"
);

/**
 * verifica o campo nome
 */
function checkName() {
  if (input.name.value === "") {
    feedbackName.innerHTML = "* O nome não pode está vazio!";
    input.name.classList.add("invalid");
    input.name.addEventListener("keyup", checkName);
    labelName.classList.add("field-invalid");
    return false;
  } else {
    feedbackName.innerHTML = "";
    input.name.classList.remove("invalid");
    labelName.classList.remove("field-invalid");
    labelName.classList.add("field-valid");
    return true;
  }
}

/**
 * verifica o campo usuario
 */
function checkUser() {
  if (input.user.value === "") {
    feedbackUser.innerHTML = "* O usuário não pode está vazio!";
    input.user.classList.add("invalid");
    input.user.addEventListener("keyup", checkUser);
    labelUser.classList.add("field-invalid");
    return false;
  } else {
    feedbackUser.innerHTML = "";
    input.user.classList.remove("invalid");
    labelUser.classList.remove("field-invalid");
    labelUser.classList.add("field-valid");
    return true;
  }
}

/**
 * verifica o campo e-mail
 */
function checkEmail() {
  if (input.email.value === "") {
    feedbackEmail.innerHTML = "* O e-mail não pode está vazio!";
    input.email.classList.add("invalid");
    input.email.addEventListener("keyup", checkEmail);
    labelEmail.classList.add("field-invalid");
    return false;
  }  else {
    feedbackEmail.innerHTML = "";
    input.email.classList.remove("invalid");
    labelEmail.classList.remove("field-invalid");
    labelEmail.classList.add("field-valid");
    return true;
  }
}

/**
 * verifica o campo senha
 */
function checkPassword() {
  if (input.password.value === "") {
    feedbackPassword.innerHTML = "* A senha não pode estar vazia!";
    input.password.addEventListener("keyup", checkPassword);
    input.password.classList.add("invalid");
    labelPassword.classList.add("field-invalid");
    return false;
  } else if (input.password.value.length < 8) {
    feedbackPassword.innerHTML =
      "* Sua senha precisa ter no mínimo 8 caracteres!";
    return false;
  } else {
    input.password.addEventListener("keyup", passwordMatch);
    feedbackPassword.innerHTML = "";
    input.password.classList.remove("invalid");
    labelPassword.classList.remove("field-invalid");
    labelPassword.classList.add("field-valid");
    return true;
  }
}

/**
 * TODO criar função para deixa o input valido o invalido visualmente
 *
 */

/**
 * verifica se os campos de senha coincidem
 */
function passwordMatch() {
  if ((input.confirmPassword.value.length && input.password.value.length) < 8) {
    feedbackConfirmPassword.innerHTML = "* Tamanho de senha insuficiente!";
    feedbackPassword.innerHTML = "* Tamanho de senha insuficiente!";
    // TODO aqui tem coisa pra fazer
    input.password.addEventListener("keyup", checkPassword);
    input.password.classList.add("invalid");
    labelPassword.classList.add("field-invalid");

    labelConfirmPassword.classList.add("field-invalid");
    input.confirmPassword.classList.add("invalid");
    return false;
  } else if (input.confirmPassword.value !== input.password.value) {
    feedbackConfirmPassword.innerHTML = "* As senhas não coincidem!";
    feedbackPassword.innerHTML = "* As senhas não coincidem!";
    labelPassword.classList.remove("field-valid");
    labelConfirmPassword.classList.remove("field-valid");

    labelPassword.classList.add("field-invalid");

    labelConfirmPassword.classList.add("field-invalid");

    return false;
  } else if (
    input.confirmPassword.value === "" &&
    input.password.value === ""
  ) {
    input.confirmPassword.classList.add("invalid");

    feedbackPassword.innerHTML = "* Senha não pode está vazio!";
    feedbackConfirmPassword.innerHTML = "* Senha não pode está vazio!";
    return false;
  } else {
    feedbackConfirmPassword.innerHTML = "";
    feedbackPassword.innerHTML = "";

    input.confirmPassword.classList.remove("invalid");
    labelConfirmPassword.classList.remove("field-invalid");
    labelConfirmPassword.classList.add("field-valid");

    input.password.classList.remove("invalid");
    labelPassword.classList.remove("field-invalid");
    labelPassword.classList.add("field-valid");

    return true;
  }
}

function allFieldsValidated() {
  const validations = [
    checkName(),
    checkUser(),
    checkEmail(),
    checkPassword(),
    passwordMatch(),
  ];
  if (validations.every(element => element === true)) {
    console.log("todos os campos estão válidos");
    return true
  } else {
    console.log("algum campo não está válido");
    return false
  }
}

// events
input.name.addEventListener("blur", checkName);
input.user.addEventListener("blur", checkUser);
input.email.addEventListener("blur", checkEmail);
input.password.addEventListener("blur", checkPassword);
input.confirmPassword.addEventListener("keyup", passwordMatch);

const buttonCreateAccount = document.getElementById("create-account");
buttonCreateAccount.addEventListener("click", (e) => {
  if(!allFieldsValidated()){
    e.preventDefault();
  }
});

// revela e oculta a senha
const showPassword = document.getElementById("show-password");
showPassword.onclick = () => {
  if (input.password.type === "password") {
    input.password.type = "text";
    showPassword.innerHTML = "Ocultar";
  } else {
    input.password.type = "password";
    showPassword.innerHTML = "Mostrar";
  }
};

const showConfirmPassword = document.getElementById("show-confirm-password");
showConfirmPassword.onclick = () => {
  if (input.confirmPassword.type === "password") {
    input.confirmPassword.type = "text";
    showConfirmPassword.innerHTML = "Ocultar";
  } else {
    input.confirmPassword.type = "password";
    showConfirmPassword.innerHTML = "Mostrar";
  }
};
