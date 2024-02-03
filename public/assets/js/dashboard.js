function changeTheme() {
  // Sélection de l'élément <html> par son id
  var htmlElement = document.getElementById('htmlElement');

  // Récupération de la valeur sélectionnée dans le sélecteur
  var selectedTheme = document.getElementById('themeSelector').value;

  // Mise à jour de la valeur de l'attribut data-bs-theme
  htmlElement.setAttribute('data-bs-theme', selectedTheme);
}
