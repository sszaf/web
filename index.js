const ratingButton = document.getElementById("ratingButton");
ratingButton.addEventListener("click",ratePage);

function ratePage() {
    const rating = parseFloat(window.prompt("Wprowadź ocenę: (1-10)"));

    if(!rating.isNan) {
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