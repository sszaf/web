const attractionInsertInput = document.getElementById("attractionInsertInput");
    const attractionList = document.getElementById("attractionList");
    const attractionInsertButton = document.getElementById(
        "attractionInsertButton"
        );
    const randomAttractionButton = document.getElementById("randomAttractionButton");
    
    window.addEventListener("load",displayAttractions);
    
    attractionInsertButton.addEventListener("click", insertAttraction);
    randomAttractionButton.addEventListener("click",scrollToRandomAttraction);
    
    
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

        switch(randomIndex) {
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
                behavior: 'smooth', 
                block: 'start'
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