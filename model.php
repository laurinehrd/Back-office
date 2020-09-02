<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";


  try{
    $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // 1 argument= connection a la base de donnée, 2= utilisateur, 3=mdp
    $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die('erreur:' . $e->getMessage()); //va chercher la fonction getmessage() qui existe déjà
  }

// créer la table dans bdd si elle n'a pas déjà été créée
  $query = "CREATE TABLE IF NOT EXISTS `user`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `mail` VARCHAR(50) NOT NULL ,
    `password` INT(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
  )";

  $request = $dB->prepare($query);
  $request->execute();
  $request->closeCursor(); // pour finir la requête



 ?>
