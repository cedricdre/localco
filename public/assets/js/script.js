// Animation AOS -- fonctionne avec le fichier = aos.js
AOS.init({
    duration: 700
});

// Fonction - Masquer le header au scroll
function masquerHeaderAuScroll() {
    let prevScrollPos = window.scrollY;
    let header = document.querySelector('.header-hide');
    let navbar = document.querySelector('.navbar');
    let scrollThresholdNavbar = 300; // Ajuster la distance de déclenchement pour la navbar
    let scrollThresholdBackground = 100; // Ajuster la distance de déclenchement pour le background

    window.onscroll = function () {
        let currentScrollPos = window.scrollY;

        if (currentScrollPos > scrollThresholdNavbar) {
            if (prevScrollPos > currentScrollPos) {
                navbar.classList.remove('header-show');
            } else {
                navbar.classList.add('header-show');
            }
        } else {
            navbar.classList.remove('header-show');
        }

        if (currentScrollPos > scrollThresholdBackground) {
            if (prevScrollPos > currentScrollPos) {
                header.classList.remove('header-show');
                header.style.backgroundColor = 'rgba(255, 255, 255)'; // Modifier la couleur de fond
            } else {
                header.classList.add('header-show');
                header.style.backgroundColor = 'transparent'; // Réinitialiser la couleur de fond
            }
        } else {
            header.classList.remove('header-show');
            header.style.backgroundColor = 'rgba(255, 255, 255)'; // Réinitialiser la couleur de fond
        }

        prevScrollPos = currentScrollPos;
    };
}

document.addEventListener("DOMContentLoaded", function () {
    masquerHeaderAuScroll();
});