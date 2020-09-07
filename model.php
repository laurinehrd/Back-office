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



insertUser('laurine.hrd@hotmail.fr', 'test');
function insertUser($email, $password){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $query = "SELECT `mail` FROM `user`";
  $request = $dB->prepare($query);
  $request->execute();
  if($donnees = $request->fetch()){
    if($donnees['mail'] == $email){
      return 'Votre email est déjà enregistré, veuillez vous connecter.';
      $request->closeCursor();
    }else{
      $query = "INSERT INTO `user`(`mail`, `password`) VALUES (:mail,:password)";
      $password = password_hash($password, PASSWORD_DEFAULT);
      $arrayValue = [
        ':mail'=>$email,
        ':password'=>$password
      ];
      $request = $dB->prepare($query);
      if($request->execute($arrayValue)){
        return 'ok';
      }else{
        return 'pas ok';
      }
      $request->closeCursor();
    }
  }
}


 ?>
