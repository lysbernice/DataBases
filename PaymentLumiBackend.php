<?php
      require "Db_connexion.php";
      require_once "PaymentLumiBackend.php";
  
      if(isset($_POST["Comfirmer"]))
      {
          if(!empty($_POST["Numero_de_votre_Sim"]) && !empty($_POST["Kabanga"]) &&  !empty($_POST["Shiramw_igitigiri_c_amahera"])  && !empty($_POST["Servisi_ya_lumicash"])){
              $Numero_de_votre_Sim=htmlspecialchars($_POST["Numero_de_votre_Sim"]);
              $Kabanga=password_hash($_POST["Kabanga"],PASSWORD_DEFAULT);
              $Shiramw_igitigiri_c_amahera=htmlspecialchars($_POST["Shiramw_igitigiri_c_amahera"]);
              $Servisi_ya_lumicash=htmlspecialchars($_POST["Servisi_ya_lumicash"]);
  
              
              
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
                   header("Location: website.php");
                   
               }else
                   $errorMessage = "Your password is incorrect";
                   
           }else
               $errorMessage = "Your username is incorrect !";
               
      }else
           $errorMessage = "Please complete all fields !";    

?>