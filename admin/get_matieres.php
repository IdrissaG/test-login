<?php
include "../connexion2.php";

if (isset($_POST['id_classe'])) {
    $id_classe = $_POST['id_classe'];
    $req1=$connexion->query("SELECT * FROM classe WHERE nom_classe='$id_classe'");
       if($req1){
       $value=$req1->fetch();
       if($value){
         $id_classe=$value['id_classe'];
       }else{
         echo "<script>alert('Il n\\'y a pas d\\'étudiant.');</script>";
       }
    }
    $matiereQuery = $connexion->query("SELECT id_matiere, nom_matiere FROM matiere WHERE id_classe = '$id_classe'");
    
    $matieres = [];
    while ($row = $matiereQuery->fetch()) {
        $matieres[] = $row;
    }
    
    echo json_encode($matieres);
}
?>
