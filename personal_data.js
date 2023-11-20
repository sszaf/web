const autoCompleteButton = document.getElementById("completeButton");
autoCompleteButton.addEventListener("click",completeForm);

function completeForm() {
    const forms = document.forms;
    console.log("FORMS ON PAGE: ",forms.length);

    const form = forms[0];

    if(form) {
        form.idName.value = "Jan";
        form.idSurname.value = "Kowalski";
        form.idMonthOfBirth.value = "Styczeń";
        form.idEmail.value = "kowalskij@gmail.com"
        form.idPhone.value = "+48 999-999-999";
    }
}