<?php
include "../connexion2.php";
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['genre']) && isset($_POST['cne']) && isset($_POST['date_naissance']) && isset($_POST['lieu_naissance']) && isset($_POST['adresse']) && isset($_POST['id_classe']) && isset($_POST['id_filiere']) && isset($_POST['id_niveau'])){
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$genre=$_POST['genre'];
$cne=$_POST['cne'];
$date_naissance=$_POST['date_naissance'];
$lieu_naissance=$_POST['lieu_naissance'];
$adresse=$_POST['adresse'];
$id_classe=$_POST['id_classe'];
$id_niveau=$_POST['id_niveau'];
$nom_niveau=$_POST['id_niveau'];
$id_filiere=$_POST['id_filiere'];
$req1=$connexion->query("SELECT * FROM classe WHERE nom_classe='$id_classe'");
if($req1){
    $value1=$req1->fetch();
    if($value1){ 
        $id_classe=$value1['id_classe'];
        }else{
            echo "value1 est false";
        }
}else{
    echo "1 ne sest pas executer"; 
}
$req2=$connexion->query("SELECT * FROM niveau WHERE nom_niveau='$id_niveau'");
if($req2){
    $value2=$req2->fetch();
    if($value2){ 
    $id_niveau=$value2['id_niveau'];
    }else{
        echo "value2 est:".$value2;
    }
}else{
    echo " 2 ne sest pas executer";
}

$connexion->query("insert into etudiant(nom,prenom,genre,date_naissance,lieu_naissance,cne,adresse,id_classe,id_filiere,id_niveau) values ('$nom','$prenom','$genre','$date_naissance','$lieu_naissance','$cne','$adresse','$id_classe','$id_filiere','$id_niveau')");

if($nom_niveau="I-1re annee"||$nom_niveau="I-2eme annee"||$nom_niveau="M-1re annee"||$nom_niveau="M-2eme annee"){
    $connexion->query("UPDATE etudiant SET montant_paiement =38000");
    }else if($nom_niveau="I-3eme annee"||$nom_niveau="I-4eme annee"||$nom_niveau="I-5eme annee"||$nom_niveau="M-3eme annee"||$nom_niveau="M-4eme annee"||$nom_niveau="M-5eme annee"){
    $connexion->query("UPDATE etudiant SET montant_paiement =45000");
    }
}

if(isset($_POST["login"]) && isset($_POST["passwd"]) && isset($_POST["nom"]) && isset($_POST["prenom"])){
 $nom=$_POST["nom"];
 $prenom=$_POST["prenom"];
 $login=$_POST["login"];
 $passwd=$_POST["passwd"];
 //$hashed_password = password_hash($passwd, PASSWORD_DEFAULT);
 $id_role=2;
 $req=$connexion->query("insert into utilisateur (nom,prenom,login,passwd,id_role) values ('$nom','$prenom','$login','$passwd','$id_role')");
 
 if($req->execute()) {
   $popup_message='Insertion Reussi !';
 }
 else {
     $popup_message = "Erreur lors de l'insertion : " . $connexion->errorInfo();
 }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style-menu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main-section.css">
   <link rel="stylesheet" href="../css/style-inscription.css"> 
   <link rel="stylesheet" href="../css/menu_hori.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<script src="../js/select_dynamique.js"></script>-->
    <title>Menu sidebar</title>
</head>
<body>
<div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bxl-codepen"></i>
                <span>University</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="user">
          <img src="../images/user-regular-24.png" alt="image-utlisateur" class="user-img">
          <div>
            <p class="bold">Idrissa</p>
            <p>Administrateur</p>
          </div> 
        </div>
        <ul>
            <li>
             <a href="admin.php">
                <i class="bx bxs-grid-alt"></i>
                <span class="nav-item">Acceuil</span>
             </a>
             <span class="tooltip">Acceuil</span>
            </li>
            <li>
             <a href="inscription.php">
                <i class="bx bx-body"></i>
                <span class="nav-item">Etudiants</span>
             </a>
             <span class="tooltip">Etudiants</span>
            </li>
            <li>
             <a href="inscription_en.php">
             <i class='bx bx-user-plus'></i>
                <span class="nav-item">Enseignants</span>
             </a>
             <span class="tooltip">Enseignants</span>
            </li>
            <li>
             <a href="ajouter_matiere.php">
             <i class='bx bxs-book-bookmark'></i>
                <span class="nav-item">Matiere</span>
             </a>
             <span class="tooltip">Matiere</span>
            </li>
            <li>
             <a href="notes.php">
             <i class='bx bxs-graduation'></i>
                <span class="nav-item">Notes</span>
             </a>
             <span class="tooltip">Notes</span>
            </li>
            <li>
             <a href="paiement.php">
             <i class='bx bx-money-withdraw'></i>
               
                <span class="nav-item">Paiements</span>
             </a>
             <span class="tooltip">Paiements</span>
            </li>
            <li>
             <a href="gestion_absences.php">
             <i class='bx bxs-time-five'></i>
               
                <span class="nav-item">Absences</span>
             </a>
             <span class="tooltip">Absences</span>
            </li>
            <li>
             <a href="../logout.php">
             <i class="bx bx-log-out"></i>
                <span class="nav-item">Se Deconnecter</span>
             </a>
             <span class="tooltip">Se Deconnecter</span>
            </li>
        </ul>
     </div>


     <div class="main-content">
        <main>
        <ul class="lu">
		<li  class="lis" ><a href="inscription.php">Ajouter un etudiant</a></li>
		<li  class="lis" ><a href="Affiche_etudiant.php">Liste des Etudiants</a></li>
	</ul>
        <div class="container">
        <form method="post" action="">
                <div class="form-first">
                    <div class="details-personal">
                        <span class="title">Informations personnelles</span>
                        <div class="fields">
                            <div class="input-field">
                                <label >Nom</label>
                                <input name="nom" type="text" placeholder="Entrer le nom" required>
                            </div>
                            <div class="input-field">
                                <label >Prenom</label>
                                <input name="prenom" type="text" placeholder="Entrer le prenom" required>
                            </div>
                            <div class="input-field">
                                <label >Genre</label>
                                <input name="genre" type="text" placeholder="Entre le genre" required>
                            </div>
                        <div class="input-field">
                                <label >CNE</label>
                                <input name="cne" type="text" placeholder="Entrer le numero de CNE" required>
                            </div>
                            <div class="input-field">
                                <label >Date de naissance</label>
                                <input name="date_naissance" type="date" placeholder="Entrer la date de naissance" required>
                            </div>
                            <div class="input-field">
                                <label >Lieu de naissance</label>
                                <input name="lieu_naissance" type="text" placeholder="Entrer le lieu de naissance" required>
                            </div>
                            <div class="input-field">
                                <label>Adresse</label>
                                <input name="adresse" type="text" placeholder="Entrer l'adresse" required>
                            </div>
                        </div>
                    </div>

                <div class="details-ID">
                    <span class="title">Information Academique</span>
                    <div class="fields">
                        <div class="input-field">
                            <label >Niveau</label>
                          <!--  <input name="id_niveau" type="text" placeholder="Entrer le niveau" required>-->
                            <select name="id_niveau" id="id_niveau">
                            </select>
                        </div>
                        <div class="input-field">
                            <label >Filiere</label>
                        <!--    <input name="id_filiere" type="text" placeholder="Entrer la filiere" required>-->
                            <select name="id_filiere" id="id_filiere">
                                <option value="1">Ingenierie</option>
                                <option value="2">Management</option>
                            </select>
                            
                        </div>
                        <div class="input-field">
                            <label >classe</label>
                  <!--   <input name="id_classe" type="text" placeholder="Entrer la classe" required>-->
                          <select name="id_classe" id="id_classe">
                           
                          </select>
                        </div>
                       <script>
  
// Options de classe pour la filière Ingenierie
var classesIngenierie = ['1GI', '2GI', '3GI', '4GI', '5GI'];
// Options de classe pour la filière Management
var classesManagement = ['1SIM', '2SIM', '3SIM', '4SIM', '5SIM'];

// Options de niveaux pour la filière Ingenierie
var niveauxIngenierie = ['I-1re annee', 'I-2eme annee', 'I-3eme annee', 'I-4eme annee','I-5eme annee'];

// Options de niveaux pour la filière Management
var niveauxManagement = ['M-1re annee', 'M-2eme annee', 'M-3eme annee', 'M-4eme annee','M-4eme annee'];

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

                       </script>
                        <div class="details-ID">
                    <span class="title">Creation Compte</span>
                    <div class="fields">
                    <div class="input-field">
                                <label >login</label>
                                <input name="login" type="text" placeholder="Creer un login" required>
                            </div>
                            <div class="input-field">
                                <label >Password</label>
                                <input name="passwd" type="text" placeholder="Creer un password" required>
                            </div>
                            <div class="input-field">
                                <label >Email</label>
                                <input name="mail" type="email" placeholder="email@mail.com" required>
                            </div>
                    </div>
                    <button type="submit" class="nxtBtn">
                        <span class="btnText">Enregistrer</span>
                        <i class='bx bxs-paper-plane'></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    </main>
     </div>
     <?php if (!empty($popup_message)) { ?>
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <!-- Fond obscur -->
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- Popup -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Contenu du popup -->
                        <div class="sm:flex sm:items-start">
                            <!-- Icône de confirmation -->
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <!-- Message de confirmation -->
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    Succès
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        <?php echo $popup_message; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <!-- Bouton de fermeture du popup -->
                        <button type="button" onclick="window.location.href='Affiche_etudiant.php'" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</body>
<script>
    let btn=document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');
    btn.onclick = function(){
        sidebar.classList.toggle('active');
    };
</script>
</html>