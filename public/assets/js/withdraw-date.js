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