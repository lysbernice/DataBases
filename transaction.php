<?php
   

        $mysqli = new mysqli('localhost', 'root', '','site_cars');
        $mysqli->autocommit(false);
        /*
        $mysqli->query("INSERT INTO payment_carte(Nom,CVV,N_de_la_carte_bancaire,Date_d_expiration)VALUES('Bernice','123','25092001','2023')");
        $mysqli->query("INSERT INTO payment_carte(Nom,CVV,N_de_la_carte_bancaire,Date_d_expiration)VALUES('Maman','0909','12122005','2025')");
        $id = $mysqli->insert_id; */

        //verification des erreurs
        $error = array();

        $a = $mysqli->query("INSERT INTO payment_lumicash(Numero_de_votre_Sim,Kabanga,Shiramw_igitigiri_c_amahera,Servisi_ya_lumicash)VALUES(?,?,?,?)");
        //array_push($error,'Problem!!!!!');


        $mysqli->query("INSERT INTO produit(Nom_prod,prix)VALUES('Range Rover','50.000.000')");
        /*$mysqli->query("INSERT INTO payment_lumicash(Numero_de_votre_Sim,Kabanga,Shiramw_igitigiri_c_amahera,Servisi_ya_lumicash)VALUES('79947809','1972','10000','5')");
        $mysqli->query("INSERT INTO payment_lumicash(Numero_de_votre_Sim,Kabanga,Shiramw_igitigiri_c_amahera,Servisi_ya_lumicash)VALUES('71675256','1958','5000','7')");
        $mysqli->query("INSERT INTO payment_lumicash(Numero_de_votre_Sim,Kabanga,Shiramw_igitigiri_c_amahera,Servisi_ya_lumicash)VALUES('69863356','2005','1000','9')");
        */
        if (!empty($error))
        {
            $mysqli->rollback();
        }

        $mysqli->commit();
   



    /*
    $config['db']=array
    (
        'host' ->'localhost',
        'username'->'root',
        'password'->'',
        'dbname'->'site_cars'
    );
   
   
    $db == new PDO('mysql:host=' .$config['db']['host'].';dbname='.$config['db']['dbname']['username'])
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    try{
        $db->beginTransaction();

        //star transaction
        //query1
       $db->query("INSERT INTO 'payment_carte'('Nom','CVV','N_de_la_carte_bancaire','Date_d_expiration')VALUES('nana','100','23456789','2022')");
       
       $db->query("UPDATE 'payment_carte' SET 'payment_carte'.'Nom'=1 WHERE 'payment_carte'.'id'=".$db->lastInsertId());
        //query2
        //query3

        //commit
        $db->commit();
   }catch(PDOException $e){
    //rollback
    $db->rollback();
    //output errr
    die($e->getMessage());
   }
   */
    
?>