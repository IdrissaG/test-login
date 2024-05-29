<?php
include "../connexion2.php";
$matiere=false;
if(isset($_POST["id_filiere"])&&isset($_POST["id_niveau"])&&isset($_POST["id_classe"])&&isset($_POST["id_semestre"])){
   $id_niveau=$_POST['id_niveau'];
   $id_filiere=$_POST['id_filiere'];
   $id_classe=$_POST['id_classe'];
   $id_semestre=$_POST['id_semestre'];
   $req=$connexion->query("SELECT * FROM classe WHERE nom_classe='$id_classe'");
   if($req){
    $value=$req->fetch();
    if($value){ 
    $id_classe=$value['id_classe'];
   }else{
      echo "<script>alert('Il n\\'y a pas de matiere.');</script>";
   }
   }else{
      echo "<script>alert('Il n\\'y a pas de matiere.');</script>";
   }
   $req2=$connexion->query("SELECT * FROM niveau WHERE nom_niveau='$id_niveau'");
   if($req){
    $value2=$req2->fetch();
    if($value2){
      $id_niveau=$value2['id_niveau'];
    }else{
      echo "<script>alert('Il n\\'y a pas de matiere.');</script>";
    }
   }else{   
      echo "<script>alert('Il n\\'y a pas de matiere.');</script>";
   }
   $req3=$connexion->query("SELECT * FROM semestre WHERE nom_semestre='$id_semestre'");
   if($req3){
    $value3=$req3->fetch();
    if($value3){ 
    $id_semestre=$value3['id_semestre'];
   }else{
      echo "<script>alert('Il n\\'y a pas de matiere.');</script>";
   }
   }else{
      echo "<script>alert('Il n\\'y a pas de matiere.');</script>";
   }
$matiere=$connexion->query("SELECT matiere.id_matiere, matiere.nom_matiere, matiere.id_semestre, enseignant.nom, enseignant.prenom, semestre.id_semestre 
FROM matiere
JOIN enseignant ON matiere.id_enseignant = enseignant.id_enseignant
JOIN semestre ON matiere.id_semestre = semestre.id_semestre
WHERE matiere.id_classe='$id_classe' AND matiere.id_niveau='$id_niveau' AND matiere.id_semestre='$id_semestre'");
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
   <link rel="stylesheet" href="../css/style_affiche.css">
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
       <div class="container1">
        <form class="form-horizontal" method="post" action="#">
            <div class="input-field">
                <label for="id_filiere">Filière</label>
                <select name="id_filiere" id="id_filiere">
                    <option value="1">Ingenierie</option>
                    <option value="2">Management</option>
                </select>
            </div>
            <div class="input-field">
                <label for="id_niveau">Niveau</label>
                <select name="id_niveau" id="id_niveau">
                    <!-- Options de niveau seront ajoutées dynamiquement par JavaScript -->
                </select>
            </div>
            <div class="input-field">
                <label>Semestre</label>
                <select name="id_semestre" id="id_semestre">
                    <!-- Options dynamiques pour les semestres -->
                </select>
            </div>
            <div class="input-field">
                <label for="id_classe">Classe</label>
                <select name="id_classe" id="id_classe">
                    <!-- Options de classe seront ajoutées dynamiquement par JavaScript -->
                </select>
            </div>
            <button type="submit">Rechercher</button>
        </form>
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
        <div class="results">
            <h3>Résultats de la recherche :</h3>
	<table class="student-table" >
	<thead>
		<tr>
      <th>ID</th>
      <th>Classe</th>
      <th>Semestre</th>
	  <th>Matiere</th>
	  <th>Enseignant</th>
      <th>Editer</th>
      <th>Supprimer</th>
		</tr>
	</thead>
    <tbody>
		<?php
      if($matiere){ 
        $req4=$connexion->query("SELECT * FROM classe WHERE id_classe='$id_classe'");
        $result=$req4->fetch();
        $req5=$connexion->query("SELECT * FROM semestre WHERE id_semestre='$id_semestre'");
        $result2=$req5->fetch();
			while($ligne=$matiere->fetch()){
		?>
		<tr>
            <td><?php echo $ligne['id_matiere']; ?></td>
            <td><?php echo $result['nom_classe']; ?></td>
            <td><?php echo $result2['nom_semestre']; ?></td>
			<td><?php echo $ligne['nom_matiere']; ?></td>
			<td><?php echo $ligne['nom']." ".$ligne['prenom']?></td>
			<td><a href="editer_matiere.php?id_matiere=<?php echo $ligne['id_matiere'];?>"><i class='bx bx-edit'></i></a></td>
			<td><a href="supprimer_matiere.php?id_matiere=<?php echo $ligne['id_matiere'];?>"><i class='bx bx-trash'></i></a></td>
		</tr>
		<?php
		   	}
         }
		?>
		</tbody>
	</table>
        </div>
    </div>
    </main>
     </div>
     
     
</body>
<script>
    let btn=document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');
    btn.onclick = function(){
        sidebar.classList.toggle('active');
    };
</script>
</html>