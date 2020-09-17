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

function connectUser($email, $passwordUser){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $query = "SELECT `password` FROM `user` WHERE `mail`=:mail";
  $request = $dB->prepare($query);
  $arrayValue = [
    ':mail'=>$email
  ];
  if($request->execute($arrayValue)){
    $donnees = $request->fetch();
    if(hash_equals($donnees['password'],$passwordUser)){
      return 'connexion ok';
    }else{
      return 'password pas ok';
    }
    $request->closeCursor();
  }
}



// BACK OFFICE
function countries(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  try{
    $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die('erreur:' . $e->getMessage());
  }
  $query = "CREATE TABLE IF NOT EXISTS `countries`(
    `id_countries` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `image` VARCHAR(255) NOT NULL ,
    `titre` VARCHAR(255) NOT NULL ,
    `contenu` TEXT NOT NULL , PRIMARY KEY (`id_countries`)) ENGINE = MyISAM;
  )";
  $request = $dB->prepare($query);
  $request->execute();
  $request->closeCursor();
}

function events(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  try{
    $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die('erreur:' . $e->getMessage());
  }
  $query = "CREATE TABLE IF NOT EXISTS `events`(
    `id_events` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `date` DATE NOT NULL ,
    `titre` VARCHAR(255) NOT NULL ,
    `contenu` TEXT NOT NULL ,
    `horaires` DATETIME NOT NULL , PRIMARY KEY (`id_events`)) ENGINE = MyISAM;
  )";
  $request = $dB->prepare($query);
  $request->execute();
  $request->closeCursor();
}

function news(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  try{
    $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die('erreur:' . $e->getMessage());
  }
  $query = "CREATE TABLE IF NOT EXISTS `news`(
    `id_news` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `image` VARCHAR(255) NOT NULL ,
    `date` DATE NOT NULL ,
    `titre` VARCHAR(255) NOT NULL , PRIMARY KEY (`id_news`)) ENGINE = MyISAM;
  )";
  $request = $dB->prepare($query);
  $request->execute();
  $request->closeCursor();
}

function services(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  try{
    $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die('erreur:' . $e->getMessage());
  }
  $query = "CREATE TABLE IF NOT EXISTS `services`(
    `id_services` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `icone` VARCHAR(255) NOT NULL ,
    `titre` VARCHAR(255) NOT NULL ,
    `contenu` TEXT NOT NULL , PRIMARY KEY (`id_services`)) ENGINE = MyISAM;
  )";
  $request = $dB->prepare($query);
  $request->execute();
  $request->closeCursor();
}

function testimonial(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test";
  try{
    $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(Exception $e){
    die('erreur:' . $e->getMessage());
  }
  $query = "CREATE TABLE IF NOT EXISTS `testimonial`(
    `id_testimonial` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `image` VARCHAR(255) NOT NULL ,
    `prénom` VARCHAR(255) NOT NULL ,
    `nom` VARCHAR(255) NOT NULL ,
    `métier` VARCHAR(255) NOT NULL ,
    `contenu` TEXT NOT NULL , PRIMARY KEY (`id_testimonial`)) ENGINE = MyISAM;
  )";
  $request = $dB->prepare($query);
  $request->execute();
  $request->closeCursor();
}

// function essai(){
//   $servername = "localhost";
//   $username = "root";
//   $password = "";
//   $dbname = "test";
//   try{
//     $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   }catch(Exception $e){
//     die('erreur:' . $e->getMessage());
//   }
//   $query = "CREATE TABLE IF NOT EXISTS `essai`(
//     `id_essai` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
//     `image` VARCHAR(255) NOT NULL ,
//     `prénom` VARCHAR(255) NOT NULL ,
//     `nom` VARCHAR(255) NOT NULL ,
//     `métier` VARCHAR(255) NOT NULL ,
//     `contenu` TEXT NOT NULL , PRIMARY KEY (`id_essai`)) ENGINE = MyISAM;
//   )";
//   $request = $dB->prepare($query);
//   $request->execute();
//   $request->closeCursor();
// }

// function essainumdeux(){
//   $servername = "localhost";
//   $username = "root";
//   $password = "";
//   $dbname = "test";
//   try{
//     $dB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $dB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   }catch(Exception $e){
//     die('erreur:' . $e->getMessage());
//   }
//   $query = "CREATE TABLE IF NOT EXISTS `essainumdeux`(
//     `id_essainumdeux` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
//     `mail` VARCHAR(50) NOT NULL ,
//     `password` INT(255) NOT NULL , PRIMARY KEY (`id_essainumdeux`)) ENGINE = MyISAM;
//   )";
//   $request = $dB->prepare($query);
//   $request->execute();
//   $request->closeCursor();
// }

function createTable(){
  countries();
  events();
  news();
  services();
  testimonial();
  // essai();
  // essainumdeux();
}

createtable();


 ?>
