// function changeTheme() {
//   // Sélection de l'élément <html> par son id
//   var htmlElement = document.getElementById('htmlElement');

//   // Récupération de la valeur sélectionnée dans le sélecteur
//   var selectedTheme = document.getElementById('themeSelector').value;

//   // Mise à jour de la valeur de l'attribut data-bs-theme
//   htmlElement.setAttribute('data-bs-theme', selectedTheme);
// }


function changeTheme() {
  // Sélection de l'élément <html> par son id
  var htmlElement = document.getElementById('htmlElement');

  // Récupération de la valeur sélectionnée dans le sélecteur
  var selectedTheme = document.getElementById('themeSelector').value;

  // Mise à jour de la valeur de l'attribut data-bs-theme
  htmlElement.setAttribute('data-bs-theme', selectedTheme);

  // Sauvegarde du choix de l'utilisateur dans le LocalStorage
  localStorage.setItem('selectedTheme', selectedTheme);
}

document.addEventListener('DOMContentLoaded', function() {
  var htmlElement = document.getElementById('htmlElement');
  var selectedTheme = localStorage.getItem('selectedTheme');

  // Vérifiez si un thème a été enregistré dans le LocalStorage
  if (selectedTheme) {
    // Appliquez le thème enregistré
    htmlElement.setAttribute('data-bs-theme', selectedTheme);

    // Mettez à jour la valeur du sélecteur de thème
    document.getElementById('themeSelector').value = selectedTheme;
  }
});
