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


function insertUser($email, $password){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $result = emailExist($email);
  if($result == 'return ok'){
    $query = "INSERT INTO `user`(`mail`, `password`) VALUES (:mail,:password)";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $arrayValue = [
      ':mail'=>$email,
      ':password'=>$password
    ];
    $request = $dB->prepare($query);
    if($request->execute($arrayValue)){
      return 'ok';
    }
  }else{
    return "l'email existe déjà. Veuillez vous connecter.";
  }
}

function emailExist($email){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $query = "SELECT `mail` FROM `user`";
  $request = $dB->prepare($query);
  $request->execute();

  while($donnees = $request->fetch()){
    if($donnees['mail'] == $email){
      return 'email existant';
    }else{
      return 'return ok';
    }
    $request->closeCursor();
  }
}

function connectUser($email, $password){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $query = "SELECT `password` FROM `user` WHERE `mail`=:mail";
  $request = $dB->prepare($query);
  $arrayValue = [
    ':mail'=>$email,
  ];
  if($request->execute($arrayValue)){
    $donnees = $request->fetch();
    if(password_verify($password,$donnees['password'])){
      return 'connexion ok';
    }else{
      return 'password pas ok';
    }
    $request->closeCursor();
  }
}

 ?>
