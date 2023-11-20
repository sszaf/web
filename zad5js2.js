
const userNameHelp = document.getElementById("name_input");
const userSurnameHelp = document.getElementById("surname_input");
const userMonthHelp = document.getElementById("month_input");
const userMailHelp = document.getElementById("mail_input");
const userPhoneHelp = document.getElementById("phone_input");

const userNameInput = document.getElementById("idName");
const userSurnameInput = document.getElementById("idSurname");
const userMonthInput = document.getElementById("idMonthOfBirth");
const userMailInput = document.getElementById("idEmail");
const userPhoneInput = document.getElementById("idPhone");

function focus(element) {
  element.style.display = "block";
}

function blur(element) {
  element.style.display = "none";
}

userNameInput.addEventListener("focus", function () {
  focus(userNameHelp);
});

userNameInput.addEventListener("blur", function () {
  blur(userNameHelp);
});

userSurnameInput.addEventListener("focus", function () {
  focus(userSurnameHelp);
});

userSurnameInput.addEventListener("blur", function () {
  blur(userSurnameHelp);
});

userMonthInput.addEventListener("focus",function () {
  focus(userMonthHelp);
});

userMonthInput.addEventListener("blur", function () {
  blur(userMonthHelp);
});
userMailInput.addEventListener("focus", function () {
  focus(userMailHelp);
});

userMailInput.addEventListener("blur", function () {
  blur(userMailHelp);
});

userPhoneInput.addEventListener("focus", function () {
  focus(userPhoneHelp);
});

userPhoneInput.addEventListener("blur", function () {
  blur(userPhoneHelp);
});

function submitForm(event) {
  const confirmed = confirm("Czy na pewno chcesz przesłać formularz?");
  if (confirmed) {
    document.getElementById("personal_form").submit();
  }
  else{
    event.preventDefault();
  }
}
function resetForm(event){
  const confirmed = confirm("Czy na pewno chcesz zresetować formularz?");
  if (confirmed) {
    document.getElementById("personal_form").reset();
  }
  else{
    event.preventDefault();
  }
}

document.getElementById("personal_form").addEventListener("submit", submitForm);
document.getElementById("personal_form").addEventListener("reset", resetForm);