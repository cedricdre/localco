// Animation AOS -- fonctionne avec le fichier = aos.js
AOS.init({
    duration: 700
});

// Fonction - Masquer le header au scroll
function hideHeaderScroll() {
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
    hideHeaderScroll();
});



// Gestion date 
document.getElementById('withdrawDate').addEventListener('input', function() {
    var selectedDate = new Date(this.value);
    var currentDate = new Date();
    var dayOfWeek = selectedDate.getDay(); // 0 pour dimanche, 1 pour lundi, ..., 6 pour samedi
    
    // Si le jour est samedi (6) ou dimanche (0) ou antérieur au jour actuel, réinitialiser la valeur de l'input
    if (dayOfWeek === 0 || dayOfWeek === 6 || selectedDate < currentDate) {
        alert("Vous ne pouvez pas sélectionner un samedi, un dimanche ou une date antérieure au jour actuel.");
        this.value = ''; // Réinitialiser la valeur de l'input
    }
});