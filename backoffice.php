<?php include 'header.php';
require ('model.php');?>


<div class="contaier-fluid d-flex">
  <div class="sidebar col-lg-3 bg-gradient text-center">
    <h2>Add a new project :</h2>
    <p class="italique">Select a category</p>
    <button type="button" class="btn btn-outline-light" id="countries" onclick="countries()">Countries</button><br>
    <button type="button" class="btn btn-outline-light" id="events" onclick="events()">Events</button><br>
    <button type="button" class="btn btn-outline-light" id="news" onclick="news()">News</button><br>
    <button type="button" class="btn btn-outline-light" id="services" onclick="services()">Services</button><br>
    <button type="button" class="btn btn-outline-light" id="testimonial" onclick="testimonial()">Testimonial</button>


  </div>
  <div class="col-lg-9 p-3">
    <p class="text-success d-flex justify-content-end">You are logged in.</p>

    <h3 class="text-center">Welcome to the dashboard</h3>

<!-- PARTIE SERVICES -->
    <form class="form" id="form_services" action="backoffice.php" method="post">
      <h4 class="mb-5 text-uppercase">Our Services :</h4>

      <label for="title" class="form-label">Title :</label>
      <input class="form-control w-50" type="text" name="title" id="title"><br>

      <label for="content" class="form-label">Content :</label>
      <textarea class="form-control w-50" rows="5" type="text" name="content" id="content"></textarea><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_POST['title']) && isset($_POST['content'])){

      $title = $_POST['title'];
      $content = $_POST['content'];
      $query = "INSERT INTO `services`(`titre`, `contenu`) VALUES (:title, :content )";
      $arrayValue = [
        ':title' =>$title,
        ':content' =>$content
      ];
      $request = $dB->prepare($query);
      $request->execute($arrayValue);
      $request->closeCursor();
    }
    ?>


<!-- PARTIE NEWS -->
    <form class="form" id="form_news" action="backoffice.php" method="post">
      <h4 class="mb-5 text-uppercase">News :</h4>

      <label for="date" class="form-label">Date :</label>
      <input class="form-control w-50" type="date" name="date" id="date"></input><br>

      <label for="title" class="form-label">Title :</label>
      <input class="form-control w-50" type="text" name="title" id="title"><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_POST['date']) && isset($_POST['title'])){

      $date = $_POST['date'];
      $title = $_POST['title'];
      $query = "INSERT INTO `news`(`date`, `titre`) VALUES (:date, :title )";
      $arrayValue = [
        ':date' =>$date,
        ':title' =>$title
      ];
      $request = $dB->prepare($query);
      $request->execute($arrayValue);
      $request->closeCursor();
    }
    ?>

<!-- PARTIE EVENTS -->
    <form class="form" id="form_events" action="backoffice.php" method="post">
      <h4 class="mb-5 text-uppercase">Upcoming University Events :</h4>

      <label for="date" class="form-label">Date :</label>
      <input class="form-control w-50" type="date" name="date" id="date"></input><br>

      <label for="title" class="form-label">Title :</label>
      <input class="form-control w-50" type="text" name="title" id="title"><br>

      <label for="content" class="form-label">Content :</label>
      <textarea class="form-control w-50" rows="5" type="text" name="content" id="content"></textarea><br>

      <label for="hours" class="form-label">Hours :</label>
      <input class="form-control w-50" type="time" name="hours" id="hours"><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_POST['date']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['hours'])){

      $date = $_POST['date'];
      $title = $_POST['title'];
      $content = $_POST['content'];
      $hours = $_POST['hours'];
      $query = "INSERT INTO `events`(`date`, `titre`, `contenu`, `horaires`) VALUES (:date,:title,:contenu,:hours)";
      $arrayValue = [
        ':date' =>$date,
        ':title' =>$title,
        ':contenu' =>$content,
        ':hours' =>$hours
      ];
      $request = $dB->prepare($query);
      $request->execute($arrayValue);
      $request->closeCursor();
    }
    ?>


<!-- PARTIE COUNTRIES -->
    <form class="form" id="form_countries" action="backoffice.php" method="post">
      <h4 class="mb-5 text-uppercase">Countries We Covered :</h4>

      <label for="title" class="form-label">Title :</label>
      <input class="form-control w-50" type="text" name="title" id="title"><br>

      <label for="content" class="form-label">Content :</label>
      <textarea class="form-control w-50" rows="5" type="text" name="content" id="content"></textarea><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_POST['title']) && isset($_POST['content'])){

      $title = $_POST['title'];
      $content = $_POST['content'];
      $query = "INSERT INTO `countries`(`titre`, `contenu`) VALUES (:title,:content)";
      $arrayValue = [
        ':title' =>$title,
        ':content' =>$content
      ];
      $request = $dB->prepare($query);
      $request->execute($arrayValue);
      $request->closeCursor();
    }
    ?>

<!-- PARTIE TESTIMONIAL -->
    <form class="form" id="form_testimonial" action="backoffice.php" method="post">
      <h4 class="mb-5 text-uppercase">Testimonial :</h4>

      <label for="firstname" class="form-label">Firstname :</label>
      <input class="form-control w-50" type="text" name="firstname" id="firstname"></input><br>

      <label for="lastname" class="form-label">Lastname :</label>
      <input class="form-control w-50" type="text" name="lastname" id="lastname"><br>

      <label for="job" class="form-label">Job :</label>
      <input class="form-control w-50" type="text" name="job" id="job"><br>

      <label for="content" class="form-label">Content :</label>
      <textarea class="form-control w-50" rows="5" type="time" name="content" id="content"></textarea><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['job']) && isset($_POST['content'])){

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $job = $_POST['job'];
      $content = $_POST['content'];
      $query = "INSERT INTO `testimonial`(`prénom`, `nom`, `métier`, `contenu`) VALUES (:firstname,:lastname,:job,:content)";
      $arrayValue = [
        ':firstname' =>$firstname,
        ':lastname' =>$lastname,
        ':job' =>$job,
        ':content' =>$content
      ];
      $request = $dB->prepare($query);
      $request->execute($arrayValue);
      $request->closeCursor();
    }
    ?>


  </div>

</div>
















<?php include 'footer.php';?>
