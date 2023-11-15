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

        if(!team1Result.isNan && !team2Result.isNan) {
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
        let counter = 0;
        switch(position.trim().toLowerCase()) {
            case "bramkarz":
                for(counter;counter<goalkeepers.length;counter+=1) {
                    document.writeln("<li>" + goalkeepers[counter] + "</li>");
                }
                break;
            case "obrońca":
                while(counter < defenders.length) {
                    document.writeln("<li>" + defenders[counter] + "</li>");
                    counter+=1;
                }
                break;
            case "pomocnik":
                if(midfielders.length !== 0) {
                    do {
                        document.writeln("<li>" + midfielders[counter] + "</li>");
                        counter+=1;
                    } while(counter < midfielders.length);
                }
                break;
            case "napastnik":
                attackers.forEach(function(player) {
                    document.writeln("<li>" + player + "</li>");
                });
                break;
            default:
                window.alert("Niepoprawna pozycja!");}
}