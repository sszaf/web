const attractionInsertInput = document.getElementById("attractionInsertInput");
const combineListsButton = document.getElementById("combineListsButton");
const attractionList = document.getElementById("attractionList");
const suggestionList = document.getElementById("suggestedAttractions");
const deleteButton = document.getElementById("deleteButton");
const replaceButton = document.getElementById("replaceButton");
const combinedList = document.getElementById("combinedList");
const addTextButton = document.getElementById("addTextButton");
const resetListButton = document.getElementById("resetListButton");
const imagesOnPageButton = document.getElementById("imagesOnPageButton");
const attractionInsertButton = document.getElementById(
    "attractionInsertButton"
);
const randomAttractionButton = document.getElementById(
    "randomAttractionButton"
);

window.addEventListener("load", displayAttractions);

attractionInsertButton.addEventListener("click", insertAttraction);
randomAttractionButton.addEventListener("click", scrollToRandomAttraction);
combineListsButton.addEventListener("click", combineAttractions);
deleteButton.addEventListener("click", deleteSelected);
replaceButton.addEventListener("click", replaceItem);
addTextButton.addEventListener("click", addText);
resetListButton.addEventListener("click", resetList);
imagesOnPageButton.addEventListener("click", imagesInfo);


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

function scrollToRandomAttraction() {
    const randomIndex = Math.floor(Math.random() * 8);
    let targetElement = null;
    switch (randomIndex) {
    case 0:
        targetElement = document.getElementById("zamek_ksiazat_pomorskich");
        break;
    case 1:
        targetElement = document.getElementById("muzeum_narodowe");
        break;
    case 2:
        targetElement = document.getElementById("waly_chrobrego");
        break;
    case 3:
        targetElement = document.getElementById("filharmonia");
        break;
    case 4:
        targetElement = document.getElementById("bazylika");
        break;
    case 5:
        targetElement = document.getElementById("jezioro_szmaragdowe");
        break;
    case 6:
        targetElement = document.getElementById("centrum_morskie");
        break;
    case 7:
        targetElement = document.getElementById("brama_portowa");
        break;
    }
    if (targetElement) {
        targetElement.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    }
}
function displayAttractions() {
    const savedAttractions = JSON.parse(
        localStorage.getItem("userAttractions")
    ) || [];

    attractionList.innerHTML = "";
    savedAttractions.forEach(function (item) {
        attractionList.innerHTML += "<li>" + item + "</li>";
    });
}
function combineAttractions() {
    const page_attr = suggestionList.querySelectorAll("li > figure > h3");
    const user_attr = attractionList.querySelectorAll("li");
    const all_attr = [...page_attr, ...user_attr];
    all_attr.forEach(function (item, index) {
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.id = `item${index + 1}`;
        checkbox.name = "items";
        checkbox.value = `item${index + 1}`;
        const label = document.createElement("label");
        label.setAttribute("for", `item${index + 1}`);
        label.textContent = `${index + 1}. ` + item.textContent;
        const listItem = document.createElement("li");
        listItem.appendChild(checkbox);
        listItem.appendChild(label);
        combinedList.appendChild(listItem);
    });
}


function deleteSelected() {
    const checkboxes = combinedList.querySelectorAll(
        `li input[type="checkbox"]`
    );
    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            const listItem = checkbox.parentElement;
            listItem.remove();
        }
    });
}

function replaceItem() {
    const selectedListItem = combinedList.querySelectorAll(
        `li input[type="checkbox"]:checked`
    );
    if (selectedListItem) {
        const newValue = window.prompt("Wprowadź nową wartość: ");
        selectedListItem.forEach(function (item) {
            if (newValue) {
                const newListItem = document.createElement("li");
                const checkbox = document.createElement("input");
                checkbox.type = "checkbox";

                const label = document.createElement("label");
                label.textContent = newValue;

                newListItem.appendChild(checkbox);
                newListItem.appendChild(label);
                combinedList.replaceChild(newListItem, item.parentElement);
            } else {
                window.alert("Błędne wejście!");
            }
        });
    } else {
        window.alert("Nie zaznaczono żadnej opcji.");
    }
}



function addText() {
    const newValue = window.prompt("Wprowadź teskt: ");
    if (newValue) {
        const newListItem = document.createElement("li");
        const textNode = document.createTextNode(newValue);
        newListItem.appendChild(textNode);
        const firstItem = combinedList.firstChild;
        combinedList.insertBefore(newListItem, firstItem);
    } else {
        window.alert("Nieprawidłowe wejście!");
    }
}


function resetList() {
    const listElements = combinedList.querySelectorAll("li");

    listElements.forEach(function (item) {
        combinedList.removeChild(item);
    });
}


function imagesInfo() {
    const images = document.images;
    const imageArray = Array.from(images);

    imageArray.forEach(function (image) {
        document.writeln(image.alt + " " + image.src + "<br>");
    });
}