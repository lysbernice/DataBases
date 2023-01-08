<?php
    require "Db_connexion.php";
    require_once "inscriptionBackend.php";

    if(isset($_POST["enreg"]))
    {
        if(!empty($_POST["nom"]) && !empty($_POST["adresse"]) &&  !empty($_POST["numero_telephone"])  && !empty($_POST["username"]) && !empty($_POST["mot_de_passe"]) ){
            $Nom=htmlspecialchars($_POST["nom"]);
            $Adresse=htmlspecialchars($_POST["adresse"]);
            $telephone=htmlspecialchars($_POST["numero_telephone"]);
            $username=htmlspecialchars($_POST["username"]);
            $mot_de_passe=password_hash($_POST["mot_de_passe"],PASSWORD_DEFAULT);

            
            
            $checkIfUserAlreadyExists = $Db_connexion -> prepare("SELECT username FROM users_table WHERE username=?");
            $checkIfUserAlreadyExists->execute(array($username));

            if ($checkIfUserAlreadyExists -> rowCount()  == 0){
                $insertUserOnTheWebSite = $Db_connexion -> prepare("INSERT INTO users_table (nom,adresse,numero_telephone,username,mot_de_passe)VALUES(?,?,?,?,?)");
                $insertUserOnTheWebSite -> execute(array($Nom,$Adresse,$telephone,$username,$mot_de_passe));

                $getInfosOfThisUser = $Db_connexion -> prepare("SELECT id_user,nom,adresse,numero_telephone,username,mot_de_passe FROM users_table WHERE username=? AND mot_de_passe=?");
                $getInfosOfThisUser ->execute(array($username,$mot_de_passe));

                $usersInfos = $getInfosOfThisUser >fetch($getInfosOfThisUser);

                 // authentication user on website
                 $_SESSION["auth"] = true;
                 $_SESSION["id"] = $usersInfos["id_user"];
                 $_SESSION["username"] = $usersInfos["username"];
                 $_SESSION["mot_de_passe"] = $usersInfos["mot_de_passe"];
                 
                 // redirection to homepage
                 header("Location: payment.php");
                 
             }else
             
                 $errorMessage = "Your password is incorrect";
                 
         }else
             $errorMessage = "Your username is incorrect !";
             
    }else
         $errorMessage = "Please complete all fields !";    
?>    