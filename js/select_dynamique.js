
// Options de classe pour la filière Ingenierie
var classesIngenierie = ['1GI', '2GI', '3GI', '4GI', '5GI'];
// Options de classe pour la filière Management
var classesManagement = ['1SIM', '2SIM', '3SIM', '4SIM', '5SIM'];

// Options de niveaux pour la filière Ingenierie
var niveauxIngenierie = ['I-1ere annee', 'I-2eme annee', 'I-3eme annee', 'I-4eme annee','I-5eme annee'];

// Options de niveaux pour la filière Management
var niveauxManagement = ['M-1ere annee', 'M-2eme annee', 'M-3eme annee', 'M-4eme annee','M-4eme annee'];

// Fonction pour mettre à jour dynamiquement les options de classe et de niveau en fonction de la filière sélectionnée
function updateOptions() {
    var filiere = document.getElementById('id_filiere').value;
    var classeDropdown = document.getElementById('id_classe');
    var niveauDropdown = document.getElementById('id_niveau');
    classeDropdown.innerHTML = ''; // Supprime toutes les options actuelles
    niveauDropdown.innerHTML = ''; // Supprime toutes les options actuelles

    var classes, niveaux;
    if (filiere === '1') {
        classes = classesIngenierie;
        niveaux = niveauxIngenierie;
    } else if (filiere === '2') {
        classes = classesManagement;
        niveaux = niveauxManagement;
    }

    // Mettre à jour les options de classe
    classes.forEach(function(classe) {
        var option = document.createElement('option');
        option.value = classe;
        option.textContent = classe;
        classeDropdown.appendChild(option);
    });

    // Mettre à jour les options de niveau
    niveaux.forEach(function(niveau) {
        var option = document.createElement('option');
        option.value = niveau;
        option.textContent = niveau;
        niveauDropdown.appendChild(option);
    });
}

// Appeler la fonction updateOptions lorsqu'il y a un changement dans le menu déroulant de la filière
document.getElementById('id_filiere').addEventListener('change', updateOptions);

// Appeler la fonction updateOptions au chargement de la page pour afficher les options de classe et de niveau par défaut
updateOptions();
