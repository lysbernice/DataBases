<?php
   try {
    //code...
    session_start();
    $Db_connexion = new PDO('mysql:host=localhost;dbname=site_cars;charset=utf8;', 'root','');
   } catch (Exception $e) {
    die('An error was found :' .$e ->getMessage());
   }
?>