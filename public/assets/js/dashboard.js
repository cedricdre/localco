// function changeTheme() {
//   // Sélection de l'élément <html> par son id
//   var htmlElement = document.getElementById('htmlElement');

//   // Récupération de la valeur sélectionnée dans le sélecteur
//   var selectedTheme = document.getElementById('themeSelector').value;

//   // Mise à jour de la valeur de l'attribut data-bs-theme
//   htmlElement.setAttribute('data-bs-theme', selectedTheme);
// }


function changeTheme() {

  let htmlElement = document.getElementById('htmlElement');

  let selectedTheme = document.getElementById('themeSelector').value;

  htmlElement.setAttribute('data-bs-theme', selectedTheme);

  // Sauvegarde LocalStorage
  localStorage.setItem('selectedTheme', selectedTheme);
}

document.addEventListener('DOMContentLoaded', function() {
  let htmlElement = document.getElementById('htmlElement');
  let selectedTheme = localStorage.getItem('selectedTheme');

  // Vérifiez si thème enregistré dans LocalStorage
  if (selectedTheme) {
    // Appliquez le thème enregistré
    htmlElement.setAttribute('data-bs-theme', selectedTheme);

    // Mettez à jour la valeur du sélecteur de thème
    document.getElementById('themeSelector').value = selectedTheme;
  }
});
