// RECUPERER LES ELEMENTS DU DOM

// pour la navigation
let btnHamburger = document.querySelector(".hamburger");
let navLinks = document.querySelector(".nav-link"); 
let btnIcon = document.querySelector(".hamburger i"); 
let navSearch = document.querySelector(".search-bar");

// pour le menu card 
let iconNavCards = document.querySelectorAll(".bi-three-dots-vertical");

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

// POUR AFFICHER LE MENU 
iconNavCards.forEach(icon =>{
    icon.addEventListener("click",(e)=>{
        // recuperer  la valeur de data-index
        const index = e.target.dataset.index;
        // recupere le menu avec index 
        const menu = document.getElementById(`menu-${index}`);
        // condition ternaire pour affiche / masuqer le menu
        menu.style.display= menu.style.display === "flex" ? "none" : "flex";
    } )
})

// ACTION QUAND ON CLIQUE SUR LE BOUTON HAMBURGER
btnHamburger.addEventListener("click", funcMenuHamburger);

