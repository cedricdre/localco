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
                    console.log(data);
                })



    });
});



// nomdediv.addEventListener('click', () => {
//     fetch('ajaxGetDate.php')
//     .then((response) => {
//         return response.json();
//     })
//     .then((data) => {
//         data;
//     })
// })

//php  ajaxGetDate.php
// json_encode('text')

// let myForm = new FormData();
// myForm.append('email', email.value)

// option {
//     body: myForm,
//     method: 'POST'
// }

// fetch('ajaxGetDate.php', option)
