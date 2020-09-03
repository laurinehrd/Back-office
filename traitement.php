<?php
session_start();

$errors = [];


if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordVerif'])) {
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordVerif'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordVerif = $_POST['passwordVerif'];
    if(checkEmail($email) == true && checkPassword($password) == true){
      // hachage mdp
      // insertion bdd
    }
  }
}
$_SESSION['errors'] = $errors;
// header('Location:index.php');

function checkEmail($email){
  if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email)<50) {
    return true;
  }else{
    var_dump($errors);
    array_push($errors, 'Email non valide');
  }
}

function checkPassword($password, $passwordVerif){
  if(preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password) && $password == $passwordVerif){
    return true;
  }else{
    array_push($errors, 'Mot de passe non valide');
  }
}

 ?>
