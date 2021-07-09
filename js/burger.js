var hamburger = document.querySelector(".hamburger");
var menu = document.querySelector("#menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
  
    hamburger.classList.toggle("active");
    menu.classList.toggle("active");

}

var mot = document.querySelectorAll(".mot");

mot.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    menu.classList.remove("active");
}

var expand = document.getElementById('img1');
var dropdown = document.getElementById('drop');
var btnClose = document.getElementById('btnClose');

expand.addEventListener('click', openPopup);
btnClose.addEventListener('click', closePopUp);

function openPopup() {
    dropdown.style.display = 'block';
    expand.style.display = 'none';
    btnClose.style.display = 'flex';
}

function closePopUp(){
    dropdown.style.display = 'none';
    expand.style.display = 'flex';
    btnClose.style.display = 'none';
}