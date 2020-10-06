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
if(isset($_POST['deleteC'])){
  $id = $_POST['deleteC'];
  countriesDelete($id);
  header('Location:backoffice.php');
}

// delete featured
if(isset($_POST['deleteF'])){
  $id = $_POST['deleteF'];
  featuredDelete($id);
  header('Location:backoffice.php');
}

// delete events
if(isset($_POST['deleteE'])){
  $id = $_POST['deleteE'];
  eventsDelete($id);
  header('Location:backoffice.php');
}

// delete news
if(isset($_POST['deleteN'])){
  $id = $_POST['deleteN'];
  newsDelete($id);
  header('Location:backoffice.php');
}

// delete services
if(isset($_POST['deleteS'])){
  $id = $_POST['deleteS'];
  servicesDelete($id);
  header('Location:backoffice.php');
}

// delete testimonial
if(isset($_POST['deleteT'])){
  $id = $_POST['deleteT'];
  testimonialDelete($id);
  header('Location:backoffice.php');
}



// EDIT TO UPDATE

// edit countries
if(isset($_POST['editC'])){
  $id = $_POST['editC'];
  $_SESSION['id_editC']= $id;
  $edCountries = countriesEdit($id);
  $_SESSION['countriesEd'] = $edCountries;
  header('Location:backoffice.php');
}
// edit featured
if(isset($_POST['editF'])){
  $id = $_POST['editF'];
  $_SESSION['id_editF']= $id;
  $edFeatured = featuredEdit($id);
  $_SESSION['featuredEd'] = $edFeatured;
  header('Location:backoffice.php');
}
// edit events
if(isset($_POST['editE'])){
  $id = $_POST['editE'];
  $_SESSION['id_editE']= $id;
  $edEvents = eventsEdit($id);
  $_SESSION['eventsEd'] = $edEvents;
  header('Location:backoffice.php');
}
// edit news
if(isset($_POST['editN'])){
  $id = $_POST['editN'];
  $_SESSION['id_editN']= $id;
  $edNews = newsEdit($id);
  $_SESSION['newsEd'] = $edNews;
  header('Location:backoffice.php');
}
// edit services
if(isset($_POST['editS'])){
  $id = $_POST['editS'];
  $_SESSION['id_editS']= $id;
  $edServices = servicesEdit($id);
  $_SESSION['servicesEd'] = $edServices;
  header('Location:backoffice.php');
}
// edit testimonial
if(isset($_POST['editT'])){
  $id = $_POST['editT'];
  $_SESSION['id_editT']= $id;
  $edTestimonial = testimonialEdit($id);
  $_SESSION['testimonialEd'] = $edTestimonial;
  header('Location:backoffice.php');
}

// UPDATE IN DATABASE

// update countries
if(isset($_POST['updateC'])){
  $id = $_SESSION['id_editC'];
  $new_title = $_POST['new_title'];
  $new_content = $_POST['new_content'];
  $new_image = $_FILES['new_imageC']['name'];
  $target ='images/'.$new_image;
  move_uploaded_file($_FILES['new_imageC']['tmp_name'],$target);
  countriesUpdate($id,$new_title,$new_content,$new_image);
  $_SESSION['id_editC']= null;
  header('Location:backoffice.php');
}
// update featured
if(isset($_POST['updateF'])){
  $id = $_SESSION['id_editF'];
  $new_image = $_FILES['new_imageF']['name'];
  $target ='images/'.$new_image;
  move_uploaded_file($_FILES['new_imageF']['tmp_name'],$target);
  featuredUpdate($id,$new_image);
  $_SESSION['id_editF'] = null;
  header('Location:backoffice.php');
}
// update events
if(isset($_POST['updateE'])){
  $id = $_SESSION['id_editE'];
  $new_date = $_POST['new_date'];
  $new_title = $_POST['new_title'];
  $new_content = $_POST['new_content'];
  $new_hours = $_POST['new_hours'];
  eventsUpdate($id,$new_date,$new_title,$new_content,$new_hours);
  $_SESSION['id_editE'] = null;
  header('Location:backoffice.php');
}
// update news
if(isset($_POST['updateN'])){
  $id = $_SESSION['id_editN'];
  $new_date = $_POST['new_date'];
  $new_title = $_POST['new_title'];
  $new_image = $_FILES['new_imageN']['name'];
  $target ='images/'.$new_image;
  move_uploaded_file($_FILES['new_imageN']['tmp_name'],$target);
  newsUpdate($id,$new_date,$new_title,$new_image);
  $_SESSION['id_editN'] = null;
  header('Location:backoffice.php');
}
// update services
if(isset($_POST['updateS'])){
  $id = $_SESSION['id_editS'];
  $new_content = $_POST['new_content'];
  $new_title = $_POST['new_title'];
  $new_icone = $_FILES['new_icon']['name'];
  $target ='images/'.$new_icone;
  move_uploaded_file($_FILES['new_icon']['tmp_name'],$target);
  servicesUpdate($id,$new_content,$new_title,$new_icone);
  $_SESSION['id_editS'] = null;
  header('Location:backoffice.php');
}
// update testimonial
if(isset($_POST['updateT'])){
  $id = $_SESSION['id_editT'];
  $new_firstname = $_POST['new_firstname'];
  $new_lastname = $_POST['new_lastname'];
  $new_job = $_POST['new_job'];
  $new_content = $_POST['new_content'];
  $new_image = $_FILES['new_imageT']['name'];
  $target ='images/'.$new_image;
  move_uploaded_file($_FILES['new_imageT']['tmp_name'],$target);
  testimonialUpdate($id,$new_firstname,$new_lastname,$new_job,$new_content,$new_image);
  $_SESSION['id_editT'] = null;
  header('Location:backoffice.php');
}

?>
