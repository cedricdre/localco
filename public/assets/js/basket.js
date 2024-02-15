document.querySelectorAll('.addBasket').forEach(function(button) {
    button.addEventListener('click', function() {

        let productId = button.getAttribute('data-productid');
        let quantity = document.getElementById('inputSelectQte' + productId).value;

            let formData = new FormData();
            formData.append('productId', productId);
            formData.append('quantity', quantity);

            let options = {
                method: 'POST',
                body: formData,
            };

            fetch('/controllers/ajaxAddBasket.php', options)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    if (data) {
                        // Afficher la modal 
                        const modal = new bootstrap.Modal(document.getElementById('basketModal'));
                        modal.show();
                        // // Activer la span avec le point rouge du panier
                        // const redDotSpan = document.getElementById('pointBasket');
                        // redDotSpan.classList.remove('d-none');
                    }
                })

    });
});
