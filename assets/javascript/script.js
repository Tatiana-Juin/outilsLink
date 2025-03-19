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

// CHARGEMENT DES ELEMENT DU DOM POUR LA PAGE POP UP DE LA SUPPRESSION DE L'OUTIL
let confirmationBoxes = document.querySelectorAll(".confirmation-box");
let formDelete = document.querySelector(".form-delete");
let outilId = document.querySelector(".id_outil");
let btnOuiDeletes = document.querySelectorAll(".btn-oui-delete");
let btnNonDeletes = document.querySelectorAll(".btn-non-delete");
let btnLinkDeletes = document.querySelectorAll("#btn-link-delete");
let outilIdDelete = null;

btnLinkDeletes.forEach(btnLinkDelete => {
    btnLinkDelete.addEventListener("click", (e) => {
        e.preventDefault(); // Ajout de cette ligne
        const idOutil = e.target.dataset.idOutil;
        const confirmationBox = e.target.closest('.card').querySelector('.confirmation-box');
        const idOutilInput = confirmationBox.querySelector('.id_outil');

        idOutilInput.value = idOutil;
        confirmationBox.style.display = "block";
    });
});

btnOuiDeletes.forEach(btnOuiDelete => {
    btnOuiDelete.addEventListener("click", (e) => {
        e.preventDefault();
        const confirmationBox = e.target.closest('.confirmation-box');
        const idOutil = confirmationBox.querySelector('.id_outil').value;
        console.log("ID de l'outil à supprimer:", idOutil); // Ajouter ceci

        fetch('suppressionOutil.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id_outil=' + idOutil,
        })
        .then(response => {
            if (response.ok) {
                confirmationBox.closest('.card').remove();
            } else {
                alert('Erreur lors de la suppression.');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
        confirmationBox.style.display = "none";
    });
});

btnNonDeletes.forEach(btnNonDelete => {
    btnNonDelete.addEventListener("click", (e) => {
        const confirmationBox = e.target.closest('.confirmation-box');
        confirmationBox.style.display = "none";
    });
});