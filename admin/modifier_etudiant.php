<?php
	include "../connexion.php";
	$id_etudiant=$_POST['id_etudiant'];
	$nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $date_naissance=$_POST['date_naissance'];
    $lieu_naissance=$_POST['lieu_naissance'];
    $sexe=$_POST['sexe'];
    $photo=$_POST['photo'];
    $cne=$_POST['cne'];
	$req = $connexion->query("UPDATE étudiant 
                         SET nom='$nom', prenom='$prenom', date_naissance='$date_naissance', lieu_naissance='$lieu_naissance', sexe='$sexe', photo='$photo', cne='$cne' 
                         WHERE id_etudiant=$id_etudiant");

if ($req->rowCount() > 0) {
    // Redirect to the student display page
    header("location: Affiche_etudiant.php");
    exit(); // Ensure that no further code is executed after redirection
} else {
    // Handle the case where no rows were affected (update failed)
    echo "Failed to update student. Please try again.";
}   
	header("location:Affiche_etudiant.php");
?>