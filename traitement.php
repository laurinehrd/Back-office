<?php
session_start();



if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passwordVerif'])) {
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordVerif'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordVerif = $_POST['passwordVerif'];
    $email = check($email);
    $password = check ($password);
    $passwordVerif = check($passwordVerif);

    $checkEmail = checkEmail($email);
    $checkPassword = checkPassword($password, $passwordVerif);
    if($checkEmail == true && $checkPassword == true){
      echo 'ok';
      // hachage mdp
      // insertion bdd
    }else{
      $errors = [$checkEmail, $checkPassword];
      $_SESSION['errors'] = $errors;
      var_dump($_SESSION['errors']);
    }
  }
}

// header('Location:index.php');

function checkEmail($email){
  if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email)<50) {
    return true;
  }else{
    return 'Email non valide';
  }
}

function checkPassword($password, $passwordVerif){
  if(preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password) && $password == $passwordVerif){
    return true;
  }else{
    return 'Mot de passe non valide';
  }
}

function check($input){
  trim($input);
  stripslashes($input);
  htmlspecialchars($input);
  return $input;
}

 ?>
