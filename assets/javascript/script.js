
let btnHamburger = document.querySelector(".hamburger");
let navLinks = document.querySelector(".nav-link"); 
let btnIcon = document.querySelector(".hamburger i"); 
let navSearch = document.querySelector(".search-bar");

// FONCTION POUR FAIRE FONCTIONNER LE MENU HAMBURGER
let funcMenuHamburger = (e) => {
    e.preventDefault(); 
    //pour afficher / masquer la barre de navigation 
    navLinks.classList.toggle("nav-link");
    navSearch.classList.toggle("search-bar");

    // Changer l'icône du hamburger
    if (btnIcon.classList.contains("bi-list")) {
        btnIcon.classList.remove("bi-list");
        btnIcon.classList.add("bi-x-circle");
    } else {
        btnIcon.classList.remove("bi-x-circle");
        btnIcon.classList.add("bi-list");
    }
}

// ACTION QUAND ON CLIQUE SUR LE BOUTON HAMBURGER
btnHamburger.addEventListener("click", funcMenuHamburger);
