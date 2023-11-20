const ratingButton = document.getElementById("ratingButton");
const randomLinkButton = document.getElementById("randomLinkButton");
const openFormsButton = document.getElementById("openFormsButton");
ratingButton.addEventListener("click",ratePage);
randomLinkButton.addEventListener("click", openRandomLink);
openFormsButton.addEventListener("click", openForms);

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

function openRandomLink() {
    const links = document.links;

    const randomIndex = Math.floor(Math.random() * links.length);
    const randomLink = links.item(randomIndex);

    if (randomLink) {
        window.open(randomLink.href);
    } else {
        window.alert("Nie odnaleziono zasobu!");
    }
}

function openForms() {
    const forms = document.anchors;
    
    for(let i=0;i<forms.length;i++) {
        window.open(forms[i].href);
    }
}

