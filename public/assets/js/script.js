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


// // Panier
// document.addEventListener('DOMContentLoaded', function () {
//     let addToCartBtns = document.querySelectorAll('.add-to-cart-btn');

//     addToCartBtns.forEach(function (btn) {
//         btn.addEventListener('click', function () {
//             let productId = btn.getAttribute('data-product-id');
//             let productName = btn.getAttribute('data-product-name');
//             let productPrice = btn.getAttribute('data-product-price');
//             let quantity = document.getElementById('inputSelectQte').value;

//             // Envoyer les données au serveur via une requête AJAX
//             let xhr = new XMLHttpRequest();
//             xhr.open('POST', '/../../../controllers/catalog-ctrl.php', true);
//             xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//             xhr.onreadystatechange = function () {
//                 if (xhr.readyState == 4 && xhr.status == 200) {
//                     // Traitement de la réponse du serveur si nécessaire
//                 }
//             };
//             let data = 'id=' + encodeURIComponent(productId) +
//                     '&nom=' + encodeURIComponent(productName) +
//                     '&prix=' + encodeURIComponent(productPrice) +
//                     '&quantite=' + encodeURIComponent(quantity);
//             xhr.send(data);
//         });
//     });
// });