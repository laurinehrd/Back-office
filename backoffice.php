<?php include 'header.php';
require ('model.php');?>


<div class="d-flex">
  <div class="sidebar col-lg-3 bg-gradient text-center">
    <h2>Add a new project :</h2>
    <p class="italique pb-3">Select a category</p>
    <button type="button" class="btn btn-outline-light" id="countries" onclick="countries()">Countries</button><br>
    <button type="button" class="btn btn-outline-light" id="featured" onclick="featured()">Featured</button><br>
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


<!-- PARTIE FEATURED -->
    <form class="form" id="form_featured" action="backoffice.php" method="post" enctype="multipart/form-data">
      <h4 class="mb-5 text-uppercase">Featured Universities :</h4>

      <div class="form-file">
        <input type="file" class="form-file-input" name="imageF" id="customFile1">
        <label class="form-file-label" for="customFile1">
          <span class="form-file-text">Choose image...</span>
          <span class="form-file-button">Send</span>
        </label>
      </div><br>

      <button type="submit" name="submit" class="btn btn-primary">Add the project</button>
    </form>

    <?php
    if(isset($_FILES['imageF'])){

      $image = $_FILES['imageF']['name'];
      $target ='images/'.$image;
      move_uploaded_file($_FILES['imageF']['tmp_name'],$target);
      $query = "INSERT INTO `featured`(`image`) VALUES (:image)";
      $arrayValue = [
        ':image' =>$image
      ];
      $request = $dB->prepare($query);
      $request->execute($arrayValue);
      $request->closeCursor();
    }
    ?>


<!-- PARTIE SERVICES -->
    <form class="form" id="form_services" action="backoffice.php" method="post" enctype="multipart/form-data">
      <h4 class="mb-5 text-uppercase">Our Services :</h4>

      <div class="form-file">
        <input type="file" class="form-file-input" name="icon" id="custoFile">
        <label class="form-file-label" for="custoFile">
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
    if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['icon'])){

      $title = $_POST['title'];
      $content = $_POST['content'];
      $icon = $_FILES['icon']['name'];
      $target ='images/'.$icon;
      move_uploaded_file($_FILES['icon']['tmp_name'],$target);
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
    <form class="form" id="form_news" action="backoffice.php" method="post" enctype="multipart/form-data">
      <h4 class="mb-5 text-uppercase">News :</h4>

      <div class="form-file">
        <input type="file" class="form-file-input" name="imageN" id="customFil">
        <label class="form-file-label" for="customFil">
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
    if(!empty($_POST['date']) && !empty($_POST['title']) && !empty($_FILES['imageN'])){

      $date = $_POST['date'];
      $title = $_POST['title'];
      $image = $_FILES['imageN']['name'];
      $target ='images/'.$image;
      move_uploaded_file($_FILES['imageN']['tmp_name'],$target);
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
    if(!empty($_POST['date']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['hours'])){

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
    <form class="form" id="form_countries" action="backoffice.php" method="post" enctype="multipart/form-data">
      <h4 class="mb-5 text-uppercase">Countries We Covered :</h4>

      <div class="form-file">
        <input type="file" class="form-file-input" name="imageC" id="customfile">
        <label class="form-file-label" for="customfile">
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
    if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['imageC'])){

      $title = $_POST['title'];
      $content = $_POST['content'];
      $image = $_FILES['imageC']['name'];
      $target ='images/'.$image;
      move_uploaded_file($_FILES['imageC']['tmp_name'],$target);
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
    <form class="form" id="form_testimonial" action="backoffice.php" method="post" enctype="multipart/form-data">
      <h4 class="mb-5 text-uppercase">Testimonial :</h4>

      <div class="form-file">
        <input type="file" class="form-file-input" name="image" id="customFile2">
        <label class="form-file-label" for="customFile2">
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
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['job']) && !empty($_POST['content']) && !empty($_FILES['image'])){

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $job = $_POST['job'];
      $content = $_POST['content'];
      $image = $_FILES['image']['name'];
      $target ='images/'.$image;
      move_uploaded_file($_FILES['image']['tmp_name'],$target);
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

      <div class="row row-cols-8">
        <form class="pl-0" action="backoffice.php" method="post">
      <?php
      // AFFICHAGE DANS LE FRONT
        $countries = $dB->query("SELECT `id_countries`,`image`, `titre`, `contenu` FROM `countries`");
          while($donnees = $countries->fetch()){
      ?>

          <div class="card countriescards bg-light" style="width: 18rem;">
             <img src="images/<?php echo $donnees['image'];?>" class="card-img-top" alt="<?php echo $donnees['image'];?>">
             <div class="card-body">
               <h5 class="card-text"><?php echo $donnees['titre'];?></h5>
               <p class="card-text"><?php echo $donnees['contenu'];?></p>
             </div>
             <button type="submit" class="btn btn-primary" name="delete" value="<?= $donnees['id_countries'] ?>">Supprimer</button>

           </div>

        <?php } $countries->closeCursor(); ?>
        </form>
      </div>

    </div>

    <?php
    // DELETE ITEM
    if(isset($_POST['delete'])){
      $id = $_POST['delete'];
      $query = "DELETE FROM `countries` WHERE `id_countries`=:id";
      $request = $dB->prepare($query);
      $arrayValue = [
        ':id' =>$id
      ];
      $request->execute($arrayValue);
      $request->closeCursor();
    }

    ?>






  </div>

</div>
















<?php include 'footer.php';?>
