var currentPage = window.location.pathname;

if (currentPage.endsWith("Atrakcje.html")) {

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
} else if (currentPage.endsWith("pogon.html")) {
    const match1Button = document.getElementById("match1Bet");
    const match1Prediction = document.getElementById("match1Prediction");
    const match2Button = document.getElementById("match2Bet");
    const match2Prediction = document.getElementById("match2Prediction");
    const match3Button = document.getElementById("match3Bet");
    const match3Prediction = document.getElementById("match3Prediction");
    const positionFilterButton = document.getElementById("positionFilterButton");

    match1Button.addEventListener("click",setPrediction);
    match2Button.addEventListener("click",setPrediction);
    match3Button.addEventListener("click",setPrediction);
    positionFilterButton.addEventListener("click",positionFilter);

    function getPrediction() {
        const team1Result = window.prompt("Pogoń: ");
        const team2Result = window.prompt("Przeciwnik: ");
        return [team1Result,team2Result];

    }

    function setPrediction(event) {
        const userPredictions = getPrediction();
        const team1Result = parseInt(userPredictions[0]);
        const team2Result = parseInt(userPredictions[1]);

        if(!isNaN(team1Result) && !isNaN(team2Result)) {
        switch(event.target.id) {
            case "match1Bet":
                match1Prediction.innerHTML = team1Result + " - " + team2Result;
                break;
            case "match2Bet":
                match2Prediction.innerHTML = team1Result + " - " + team2Result;
                break;
            case "match3Bet":
                match3Prediction.innerHTML = team1Result + " - " + team2Result;
                break;
            }
        } else {
            window.alert("Niepoprawny wynik!");
        }
    }

    function positionFilter() {
        const position = window.prompt("Wprowadź pozycję: ");
        const goalkeepers = ["Valentin Cojocaru",
                            "Bartosz Klebaniuk"];
        const defenders = ["Danijel Loncar",
                            "Mariusz Malec",
                            "Benedikt Zech",
                            "Wojciech Lisowski",
                            "Leonardo Koutris"];
        const midfielders = ["Fredrik Ulvestad",
                            "João Gamboa",
                            "Luka Zahovic",
                            "Rafal Kurzawa",
                            "Kacper Smolinski"];
        const attackers = ["Kamil Grosicki",
                        "Vahan Bichakhchyan",
                        "Efthymios Koulouris"];
        switch(position.trim().toLowerCase()) {
            case "bramkarz":
                for(let i=0;i<goalkeepers.length;i++) {
                    document.writeln("<li>" + goalkeepers[i] + "</li>");
                }
                break;
            case "obrońca":
                let j = 0;
                while(j < defenders.length) {
                    document.writeln("<li>" + defenders[j] + "</li>");
                    j++;
                }
                break;
            case "pomocnik":
                if(midfielders.length !== 0) {
                    let k = 0;
                    do {
                        document.writeln("<li>" + midfielders[k] + "</li>");
                        k++;
                    } while(k < midfielders.length);
                }
                break;
            case "napastnik":
                attackers.forEach(function(player) {
                    document.writeln("<li>" + player + "</li>");
                })
                break;
            default:
                window.alert("Nipoprawna pozycja!");
                break;  

        }

    }

} else if(currentPage.endsWith("index.html")) {
    const ratingButton = document.getElementById("ratingButton");
    ratingButton.addEventListener("click",ratePage);

    function ratePage() {
    const rating = parseFloat(window.prompt("Wprowadź ocenę: (1-10)"));

    if(!isNaN(rating)) {
        if(rating >= 0.0 && rating < 5.0) {
            window.alert("Ciągle pracujemy nad ulepszaniem strony. Dziękujemy za cierpliwość.");
        } else if(rating >= 5.0 && rating < 8.0) {
            window.alert("Dziękujemy za opinię. Zapraszamy do ponownego skorzystania z naszej strony.");
        } else if(rating >= 8.0 && rating <=10) {
            window.alert("\u{1F60A}");
        } else {
            window.alert("Niewłaściwy format oceny!");
        }
    }
    }
}

