const attractionInsertInput = document.getElementById("attractionInsertInput");
const attractionList = document.getElementById("attractionList");
const attractionInsertButton = document.getElementById(
    "attractionInsertButton"
);

attractionInsertButton.addEventListener("click", insertAttraction);

function insertAttraction() {
    const inputContent = attractionInsertInput.value;
    if (inputContent.length !== 0) {
        const existingData = JSON.parse(
            localStorage.getItem("userAttractions")
        ) || [];
        existingData.push(inputContent);
        localStorage.setItem("userAttractions", JSON.stringify(existingData));
        displayAttractions();
        window.alert("Atrakcja została dodana do listy.");
    } else {
        window.alert("Nie wprowadzono zmian!");
    }

}


function displayAttractions() {
    const savedAttractions = JSON.parse(
        localStorage.getItem("userAttractions")
    ) || [];

    savedAttractions.forEach(function (item) {
        attractionList.innerHTML += "<li>" + item + "</li>";
    });
}

window.onload = displayAttractions;