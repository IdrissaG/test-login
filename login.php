<?php
session_start();
  include "connexion2.php";
  //include_once "connexion.php";
  if(isset($_POST['login']) && isset($_POST['passwd'])){
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];

    $req = $connexion->query("SELECT * FROM utilisateur WHERE login = '$login'");
    if($req !== false){
        $user = $req->fetch();
        
        if($user !== false){
            //password_verify($passwd, $user["passwd"]
            echo $user["passwd"];
            if($passwd===$user["passwd"]){ 
            $_SESSION['login'] = $login;
            $role = $user['id_role'];
            if($role == 1){
                header("Location: enseignant/Accueil.php");
                exit();
            } else {
                header("Location: etudiant/Acceuil.php ");
                exit();
            }
        }else{
            echo "Mot de passe incorrect";
        }
        } else {
            echo"je retourne false";
        }
    } else {
        echo "Erreur lors de l'exécution de la requête";
    }
    if($login=='j' && $passwd== 'j'){
      header("Location: admin/admin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
   
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        <div class="input-box">
            <input type="text" name="login" class="input-field" placeholder="Nom d'utilisateur" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" name="passwd" class="input-field" placeholder="Mot de passe" autocomplete="off" required>
        </div>
       
        <div class="input-submit">
            <button type="submit" class="submit-btn" id="submit"></button>
            <label for="submit">connexion</label>
        </div>
    </div>
    </form>
</body>
</html>