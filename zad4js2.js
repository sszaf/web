

function keyCode(e){
  let text = document.getElementById("atrakcje_text");

  if(e.key === "r" || e.key === "R"){
    text.style.color = "red";
  }
  if(e.key === "b" || e.key === "B"){
    text.style.color = "blue";
  }
  if(e.key === "g" || e.key === "G"){
    text.style.color = "green";
  }
  if(e.key === "d" || e.key === "D"){
    text.style.color = "black";
  }
}

function scrollDown(e) {
  if (e.ctrlKey) {
    window.scrollTo(0, document.body.scrollHeight);
  }
}

function scrollUp(e) {
  if (e.shiftKey) {
    window.scrollTo(0,0);
  }
}
function alt(e){
  const alt = document.getElementById("alt");
  if(e.altKey){
    alt.scrollIntoView();
  }
}

function leftSide(e){
  const screenWidth = window.innerWidth;
  const background = document.getElementById("atrakcje");
  if (e.clientX < screenWidth / 2) {
    background.style.backgroundColor ="grey";
  }
  else{
    background.style.backgroundColor = "white";
  }
}

function upSide(e){
  const screenHeight = window.innerHeight;
  const headingElements = document.querySelectorAll("h3");
  if (e.clientY < screenHeight / 2) {
    changeColor(headingElements, "blue");
  }
  else{
      changeColor(headingElements, "black");
  }
}

function changeColor(header, color){
  header.forEach(function (headingElement) {
    headingElement.style.color = color;
  });
}

function screenXx(e){
  const screenWidth = window.innerWidth;
  const img = document.getElementById("img_ZS");
  if(e.screenX < screenWidth / 2){
    img.style.visibility = "hidden";
  } else {
    img.style.visibility = "visible";
  }
}

function screenYx(e){
  const screenHeight = window.innerHeight;
  const text = document.getElementById("atrakcje_text");
  if(e.screenY < screenHeight / 2){
    text.style.visibility = "hidden";
  } else {
    text.style.visibility = "visible";
  }
}

function  mouseDownrfun(e){
  const ciekawostka = document.getElementById("ciekawostka2");
  ciekawostka.style.display = "block";
}

function mouseoverfun() {
  const ciekawostka = document.getElementById("ciekawostka");
  ciekawostka.style.display = "block";
}

function mouseoutfun() {
  const ciekawostka = document.getElementById("ciekawostka");
  ciekawostka.style.display = "none";
}

window.addEventListener("keydown", keyCode);
window.addEventListener("keydown", scrollDown);
window.addEventListener("keydown", scrollUp);
window.addEventListener("keydown", alt);
document.addEventListener("mousemove",leftSide);
document.addEventListener("mousemove", upSide);
document.addEventListener("mousemove", screenXx);
document.addEventListener("mousemove", screenYx);

const img = document.getElementById("img_ciekawostka");



img.addEventListener("mouseover", mouseoverfun);
img.addEventListener("mouseout", mouseoutfun);
img.addEventListener("mousedown", mouseDownrfun);



