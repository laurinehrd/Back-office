<?php include 'header.php';
require ('model.php');?>


<div class="d-flex">
  <div class="sidebar col-lg-3 bg-gradient text-center">
    <h2>Add a new project :</h2>
    <p class="italique pb-3">Select a category</p>
    <button type="button" class="btn btn-outline-light" id="countries" onclick="countries()">Countries</button><br>
    <button type="button" class="btn btn-outline-light" id="events" onclick="events()">Events</button><br>
    <button type="button" class="btn btn-outline-light" id="news" onclick="news()">News</button><br>
    <button type="button" class="btn btn-outline-light" id="services" onclick="services()">Services</button><br>
    <button type="button" class="btn btn-outline-light" id="testimonial" onclick="testimonial()">Testimonial</button>
    <button type="button" class="btn btn-outline-light text-uppercase" id="seeall" onclick="seeall()">See all</button>
  </div>

  <div class="col-lg-9 p-3">
    <p class="text-success d-flex justify-content-end">You are logged in.</p>
    <p class="back d-flex justify-content-end"><a href="index.php">Back to index</a></p>

    <h3 class="text-center">Welcome to your dashboard</h3>

<!-- PARTIE SERVICES -->
    <form class="form" id="form_services" action="backoffice.php" method="post">
      <h4 class="mb-5 text-uppercase">Our Services :</h4>

      <div class="form-file">
        <input type="file" class="form-file-input" name="icon" id="customFile">
        <label class="form-file-label" for="customFile">
          <span class="form-file-text">Choose icon...</span>
          <span class="form-file-button">Send</span>
        </label>
      </div><br>

      <label for="title" class="form-label">Title :</label>
      <input class="form-control w-50" type="text" name="title" id="title"><br>

      <label for="content" class="form-label">Content :</label>
      <textarea class="form-control w-50" rows="5" type="text" name="content" id="content"></textarea><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['icon'])){

      $title = $_POST['title'];
      $content = $_POST['content'];
      $icon = $_POST['icon'];
      $query = "INSERT INTO `services`(`icone`,`titre`, `contenu`) VALUES (:icon,:title, :contenu )";
      $arrayValue = [
        ':icon' =>$icon,
        ':title' =>$title,
        ':contenu' =>$content
      ];
      $request = $dB->prepare($query);
      $request->execute($arrayValue);
      $request->closeCursor();
    }
    ?>


<!-- PARTIE NEWS -->
    <form class="form" id="form_news" action="backoffice.php" method="post">
      <h4 class="mb-5 text-uppercase">News :</h4>

      <div class="form-file">
        <input type="file" class="form-file-input" name="image" id="customFile">
        <label class="form-file-label" for="customFile">
          <span class="form-file-text">Choose image...</span>
          <span class="form-file-button">Send</span>
        </label>
      </div><br>

      <label for="date" class="form-label">Date :</label>
      <input class="form-control w-50" type="date" name="date" id="date"></input><br>

      <label for="title" class="form-label">Title :</label>
      <input class="form-control w-50" type="text" name="title" id="title"><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_POST['date']) && isset($_POST['title']) && isset($_POST['image'])){

      $date = $_POST['date'];
      $title = $_POST['title'];
      $image = $_POST['image'];
      $query = "INSERT INTO `news`(`image`,`date`, `titre`) VALUES (:image,:date, :title )";
      $arrayValue = [
        ':image' =>$image,
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

      <div class="form-file">
        <input type="file" class="form-file-input" name="image" id="customFile">
        <label class="form-file-label" for="customFile">
          <span class="form-file-text">Choose image...</span>
          <span class="form-file-button">Send</span>
        </label>
      </div><br>

      <label for="title" class="form-label">Title :</label>
      <input class="form-control w-50" type="text" name="title" id="title"><br>

      <label for="content" class="form-label">Content :</label>
      <textarea class="form-control w-50" rows="5" type="text" name="content" id="content"></textarea><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['image'])){

      $title = $_POST['title'];
      $content = $_POST['content'];
      $image = $_POST['image'];
      $query = "INSERT INTO `countries`(`image`,`titre`, `contenu`) VALUES (:image,:title,:content)";
      $arrayValue = [
        ':image' =>$image,
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

      <div class="form-file">
        <input type="file" class="form-file-input" name="image" id="customFile">
        <label class="form-file-label" for="customFile">
          <span class="form-file-text">Choose image...</span>
          <span class="form-file-button">Send</span>
        </label>
      </div><br>

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
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['job']) && isset($_POST['content']) && isset($_POST['image'])){

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $job = $_POST['job'];
      $content = $_POST['content'];
      $image = $_POST['image'];
      $query = "INSERT INTO `testimonial`(`image`,`prénom`, `nom`, `métier`, `contenu`) VALUES (:image,:firstname,:lastname,:job,:content)";
      $arrayValue = [
        ':image' =>$image,
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

<!-- PARTIE SEE ALL -->
    <div id="form_all" class="all">
      <h4 class="mb-5 text-uppercase">all :</h4>
      <h4 class="mb-5">Countries :</h4>

      <?php
      echo "<table style='border: solid 1px black;'>";
      echo "<tr class='name_table'><th>id_countries</th><th>image</th><th>titre</th><th>contenu</th></tr>";

      $query = "SELECT * FROM `countries`";
      $request = $dB->prepare($query);
      $request->execute();

      class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
          parent::__construct($it, self::LEAVES_ONLY);
      }
      function current() {
        return "<td style='width:150px;border:1px solid #f1faee;'>" . parent::current(). "</td>";
      }

      function beginChildren() {
        echo "<tr class='tr'>";
      }

      function endChildren() {
        echo "</tr>" . "\n";
      }
    }

      $result = $request->setFetchMode(PDO::FETCH_ASSOC);
      foreach(new TableRows(new RecursiveArrayIterator($request->fetchAll())) as $k=>$v) {
        echo $v;
      }
      $request->closeCursor();

      echo "</table>";

      ?>

    </div>

    <?php
    function titleCountries(){
      $query = "SELECT `titre` FROM `countries` WHERE `titre`='Study in Australia'";
      $request = $dB->prepare($query);
      $request->execute();
    }
    ?>



  </div>

</div>
















<?php include 'footer.php';?>
