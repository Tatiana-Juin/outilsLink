

// let nav = document.querySelector("nav");
// let btnHamburger = document.querySelector("i");
// let linkItem = document.querySelectorAll(".link-item");
// console.log(nav);
// console.log(btnHamburger);
// console.log(linkItem);



// let navigationResponsive =  () =>{
//     nav.classList.toggle("nav-link");

//     if(btnHamburger.classList.contains("bi-list")){
//         btnHamburger.classList.remove("bi-list");
//         btnHamburger.classList.add("bi-x-circle");
//         btnHamburger.style.cursor="pointer";
        

//     }
//     else{
//         btnHamburger.classList.remove("bi-x-circle");
//         btnHamburger.classList.add("bi-list");
        
//     }
// }


// btnHamburger.addEventListener("click",navigationResponsive);
let btnHamburger = document.querySelector(".hamburger"); // Sélection du bouton hamburger
let navLinks = document.querySelector(".nav-link"); // Sélection des liens du menu
let btnIcon = document.querySelector(".hamburger i"); // Sélection de l'icône du hamburger
let navSearch = document.querySelector(".search-bar");

// Fonction pour activer/désactiver le menu responsive
let funcMenuHamburger = (e) => {
    e.preventDefault(); 
    // POUR AFFICHER / MASQUER LA BARRE DE NAVIGATION ET LES LIENS 
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
