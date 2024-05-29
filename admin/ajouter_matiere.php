<?php
include "../connexion2.php";
if(isset($_POST['id_classe'])&& isset($_POST['id_filiere'])&&isset($_POST['id_niveau'])&&isset($_POST['id_enseignant'])&&isset($_POST['nom_matiere'])&&isset($_POST['id_semestre'])){ 
$nom_matiere=$_POST['nom_matiere'];
$id_classe=$_POST['id_classe'];
$id_filiere=$_POST['id_filiere'];
$id_niveau=$_POST['id_niveau'];
$id_enseignant=$_POST['id_enseignant'];
$id_semestre=$_POST['id_semestre'];
$req1=$connexion->query("SELECT * FROM classe WHERE nom_classe='$id_classe'");
if($req1){
    $result=$req1->fetch();
    $id_classe=$result['id_classe'];
}else{
    echo"req2 na pas marche";
}
$req2=$connexion->query("SELECT * FROM niveau WHERE nom_niveau='$id_niveau'");
if($req2){
    $result2=$req2->fetch();
    if($result2){
        $id_niveau=$result2['id_niveau'];
    }else{
        echo "la valeur de result:";
    }
   
}else{
    echo "req2 na pas marche";
}
$req3=$connexion->query("SELECT * FROM semestre WHERE nom_semestre='$id_semestre'");
if($req3){
    $result3=$req3->fetch();
    if($result3){
        $id_semestre=$result3['id_semestre'];
    }else{
        echo "la valeur de result:";
    }
   
}else{
    echo "req3 na pas marche";
}
	$connexion->query("INSERT INTO matiere (nom_matiere,id_niveau,id_classe,id_filiere,id_enseignant,id_semestre ) values ('$nom_matiere','$id_niveau','$id_classe','$id_filiere','$id_enseignant','$id_semestre')");
    $popup_message ="Insertion Reussi";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style-menu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main-section.css">
   <link rel="stylesheet" href="../css/style-inscription.css"> 
   <link rel="stylesheet" href="../css/menu_hori.css">
   <link rel="stylesheet" href="../css/select_design.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<li class="lis" ><a href="ajouter_matiere.php">Ajouter Matiere</a></li>
		<li class="lis" ><a href="afficher_matiere.php">Recherche Matiere</a></li>
	    </ul>
        <div class="container">
        <form method="post" action="">
                <div class="form-first">
                    

                <div class="details-ID">
                    <span class="title">Informations Academiques</span>
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
                        <div class="input-field">
                <label for="id_enseignant">Enseignant</label>
                <select name="id_enseignant" id="id_enseignant">
                    <?php
                    // Connexion à la base de données et récupération des enseignants
                    $req=$connexion->query("select * from enseignant");
                    if ($req) {
                        while($row = $req->fetch()) {
                            echo "<option value='" . $row["id_enseignant"] . "'>" . $row["nom"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>  
            <div class="input-field">
                <label>Semestre</label>
                <select name="id_semestre" id="id_semestre">
                    <!-- Options dynamiques pour les semestres -->
                </select>
            </div>
                        <div class="input-field">
                            <label >Matiere</label>
                    <input name="nom_matiere" type="text" placeholder="Entrer la matiere" required>
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
                            <script>
                                // Options de semestres pour chaque niveau
    var semestresParNiveau = {
        'I-1re annee': ['semestre-1', 'semestre-2'],
        'I-2eme annee': ['semestre-3', 'semestre-4'],
        'I-3eme annee': ['semestre-5', 'semestre-6'],
        'I-4eme annee': ['semestre-7', 'semestre-8'],
        'I-5eme annee': ['semestre-9'],
        'M-1re annee': ['semestre-1', 'semestre-2'],
        'M-2eme annee': ['semestre-3', 'semestre-4'],
        'M-3eme annee': ['semestre-5', 'semestre-6'],
        'M-4eme annee': ['semestre-7', 'semestre-8'],
        'M-5eme annee': ['semestre-9']
    };

    // Fonction pour mettre à jour dynamiquement les options de semestre en fonction du niveau sélectionné
    function updateSemestres() {
        var selectedNiveau = document.getElementById('id_niveau').value;
        var semestreDropdown = document.getElementById('id_semestre');
        semestreDropdown.innerHTML = ''; // Supprime toutes les options actuelles

        var semestres = semestresParNiveau[selectedNiveau] || [];
        semestres.forEach(function(semestre) {
            var option = document.createElement('option');
            option.value = semestre;
            option.textContent = semestre;
            semestreDropdown.appendChild(option);
        });
    }

    // Appeler la fonction updateSemestres lorsqu'il y a un changement dans le menu déroulant du niveau
    document.getElementById('id_niveau').addEventListener('change', updateSemestres);

    // Appeler la fonction updateSemestres au chargement de la page pour afficher les options de semestre par défaut
    updateSemestres();

                            </script>
                       
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
                        <button type="button" onclick="window.location.href='afficher_matiere.php'" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
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