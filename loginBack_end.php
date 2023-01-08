<?php
    require "Db_connexion.php";
    if(isset($_POST["connect"])){
        if(!empty($_POST["username"]) && !empty($_POST["mot_de_passe"])){
                
            $username = htmlspecialchars($_POST["username"]);
            $mot_de_passe = htmlspecialchars($_POST["mot_de_passe"]);
            
            $checkIfUserExists = $Db_connexion ->prepare("SELECT * FROM users_table WHERE username=?");
            $checkIfUserExists->execute(array($username));

            if ($checkIfUserExists->rowCount() > 0){
                
                $usersInfos = $checkIfUserExists->fetch();
                if (password_verify($mot_de_passe,$usersInfos["mot_de_passe"])){
                    
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
                $errorMessage = "Your nickname is incorrect !";
        }else
            $errorMessage = "Please complete all fields !";    
    }