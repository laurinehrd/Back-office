<?php
session_start();
require ('model.php');

// FORMULAIRE DE CONNEXION
if(isset($_POST['email']) && isset($_POST['password'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $result = connectUser($email, $password);
  if($result == 'connexion ok'){
    header('Location:backoffice.php');
  }else{
    header('Location:connexion.php');
  }
}

if (isset($_POST['newEmail']) && isset($_POST['newPassword']) && isset($_POST['newPasswordVerif'])) {
  if (!empty($_POST['newEmail']) && !empty($_POST['newPassword']) && !empty($_POST['newPasswordVerif'])) {

    $email = $_POST['newEmail'];
    $password = $_POST['newPassword'];
    $passwordVerif = $_POST['newPasswordVerif'];
    $email = check($email);
    $password = check ($password);
    $passwordVerif = check($passwordVerif);

    $checkEmail = checkEmail($email);
    $checkPassword = checkPassword($password, $passwordVerif);
    if($checkEmail == 1 && $checkPassword == 1){
      $result = insertUser($email, $password);
      if($result == 'ok'){
        header('Location:connexion.php');
      }else{
        $_SESSION['errors'] = "La requete n'a pas pu aboutir.";
        header('Location:connexion.php');
      }
    }else{
      $errors = [$checkEmail, $checkPassword];
      $_SESSION['errors'] = $errors;
      header('Location:connexion.php');
    }
  }
}



function checkEmail($email){
  if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email)<50) {
    return 1;
  }else{
    return 'Email non valide';
  }
}

function checkPassword($password, $passwordVerif){
  // if(preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password) && $password == $passwordVerif){
    return 1;
  // }else{
  //   return 'Mot de passe non valide';
  // }
}

function check($input){
  trim($input);
  stripslashes($input);
  htmlspecialchars($input);
  return $input;
}


// INSERTION IN DATABASE

// form featured
if(isset($_FILES['imageF'])){

  $image = $_FILES['imageF']['name'];
  $target ='images/'.$image;
  move_uploaded_file($_FILES['imageF']['tmp_name'],$target);
  featuredInsert($image);
  header('Location:backoffice.php');
}

// form services
if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['icon'])){

  $title = $_POST['title'];
  $content = $_POST['content'];
  $icon = $_FILES['icon']['name'];
  $target ='images/'.$icon;
  move_uploaded_file($_FILES['icon']['tmp_name'],$target);
  servicesInsert($title,$content,$icon);
  header('Location:backoffice.php');
}

// form news
if(!empty($_POST['date']) && !empty($_POST['title']) && !empty($_FILES['imageN'])){

  $date = $_POST['date'];
  $title = $_POST['title'];
  $image = $_FILES['imageN']['name'];
  $target ='images/'.$image;
  move_uploaded_file($_FILES['imageN']['tmp_name'],$target);
  newsInsert($date,$title,$image);
  header('Location:backoffice.php');
}

// form events
if(!empty($_POST['date']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['hours'])){

  $date = $_POST['date'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $hours = $_POST['hours'];
  eventsInsert($date,$title,$content,$hours);
  header('Location:backoffice.php');
}

// form countries
if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['imageC'])){

  $title = $_POST['title'];
  $content = $_POST['content'];
  $image = $_FILES['imageC']['name'];
  $target ='images/'.$image;
  move_uploaded_file($_FILES['imageC']['tmp_name'],$target);
  countriesInsert($title,$content,$image);
  header('Location:backoffice.php');
}

// form testimonial
if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['job']) && !empty($_POST['content']) && !empty($_FILES['image'])){

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $job = $_POST['job'];
  $content = $_POST['content'];
  $image = $_FILES['image']['name'];
  $target ='images/'.$image;
  move_uploaded_file($_FILES['image']['tmp_name'],$target);
  testimonialInsert($firstname,$lastname,$job,$content,$image);
  header('Location:backoffice.php');
}



// DELETE IN DATABASE

// delete countries
if(isset($_POST['delete'])){
  $id = $_POST['delete'];
  $query = "DELETE FROM `countries` WHERE `id_countries`=:id";
  $request = $dB->prepare($query);
  $arrayValue = [
    ':id' =>$id
  ];
  $request->execute($arrayValue);
  $request->closeCursor();
  header('Location:backoffice.php');
}

// delete featured
if(isset($_POST['delete'])){
  $id = $_POST['delete'];
  $query = "DELETE FROM `featured` WHERE `id_featured`=:id";
  $request = $dB->prepare($query);
  $arrayValue = [
    ':id' =>$id
  ];
  $request->execute($arrayValue);
  $request->closeCursor();
  header('Location:backoffice.php');
}

// delete events
if(isset($_POST['delete'])){
  $id = $_POST['delete'];
  $query = "DELETE FROM `events` WHERE `id_events`=:id";
  $request = $dB->prepare($query);
  $arrayValue = [
    ':id' =>$id
  ];
  $request->execute($arrayValue);
  $request->closeCursor();
  header('Location:backoffice.php');
}

// delete news
if(isset($_POST['delete'])){
  $id = $_POST['delete'];
  $query = "DELETE FROM `news` WHERE `id_news`=:id";
  $request = $dB->prepare($query);
  $arrayValue = [
    ':id' =>$id
  ];
  $request->execute($arrayValue);
  $request->closeCursor();
  header('Location:backoffice.php');
}

// delete services
if(isset($_POST['delete'])){
  $id = $_POST['delete'];
  $query = "DELETE FROM `services` WHERE `id_services`=:id";
  $request = $dB->prepare($query);
  $arrayValue = [
    ':id' =>$id
  ];
  $request->execute($arrayValue);
  $request->closeCursor();
  header('Location:backoffice.php');
}

// delete testimonial
if(isset($_POST['delete'])){
  $id = $_POST['delete'];
  $query = "DELETE FROM `testimonial` WHERE `id_testimonial`=:id";
  $request = $dB->prepare($query);
  $arrayValue = [
    ':id' =>$id
  ];
  $request->execute($arrayValue);
  $request->closeCursor();
  header('Location:backoffice.php');
}

?>
