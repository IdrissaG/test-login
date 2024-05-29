<?php
		include "../connexion2.php";
      $etudiant=false;
      if(isset($_POST["id_filiere"]) && isset($_POST["id_classe"])  && isset($_POST["id_niveau"])){
       $id_filiere=$_POST['id_filiere'];
       $id_classe=$_POST['id_classe'];
       $nom_classe=$id_classe;
       $req1=$connexion->query("SELECT * FROM classe WHERE nom_classe='$id_classe'");
       if($req1){
       $value=$req1->fetch();
       if($value){
         $id_classe=$value['id_classe'];
       }else{
         echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
       }
       }else{
         echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
       }
       $id_niveau=$_POST['id_niveau'];
       $req2=$connexion->query("SELECT * FROM niveau WHERE nom_niveau='$id_niveau'");
       if($req2){
         if($req2){
            $value=$req2->fetch();
            if($value){ 
               $id_niveau=$value['id_niveau'];
            }else{
               echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
            }
            
         }else{
            echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
         }
       
       }
       $etudiant=$connexion->query("select * from etudiant where id_niveau='$id_niveau' and id_classe='$id_classe'");
      }
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu_hori.css">
    <link rel="stylesheet" href="../css/style-menu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style_affiche.css">
       <link rel="stylesheet" href="../css/main-section.css">
    <link rel="stylesheet" href="../css/style-inscription.css"> 
    <link rel="stylesheet" href="../css/select_design.css">
   
   <script src="https://cdn.tailwindcss.com"></script>
   
    <title>Document</title>
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
		<li class="lis" ><a href="inscription.php">Ajouter un etudiant</a></li>
		<li class="lis" ><a class="nav_link" href="Affiche_etudiant.php">Liste des Etudiants</a></li>
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
        <div class="results">
            <h3>Résultats de la recherche :</h3>
	<table class="student-table" >
	<thead>
		<tr>
      <th>ID</th>
			<th>Nom</th>
			<th>Prenom</th>
            <th>Classe</th>
			<th>Editer</th>
			<th>Supprimer</th>
		</tr>
	</thead>
    <tbody>
		<?php
      if($etudiant){ 
			while($ligne=$etudiant->fetch()){
		?>
		<tr>
      <td><?php echo $ligne['id_etudiant']; ?></td>
			<td><?php echo $ligne['nom']; ?></td>
			<td><?php echo $ligne['prenom']; ?></td>
			<td><?php echo $nom_classe; ?></td>
			<td><a href="editer_etudiant.php?id_etudiant=<?php echo $ligne['id_etudiant'];?>"><i class='bx bx-edit'></i></a></td>
			<td><a href="supprimer_etudiant.php?id_etudiant=<?php echo $ligne['id_etudiant'];?>"><i class='bx bx-trash'></i></a></td>
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
     <script>
    let btn=document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');
    btn.onclick = function(){
        sidebar.classList.toggle('active');
    };
</script>
</body>

</html>