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
    <form class="form" id="form_featured" action="traitement.php" method="post" enctype="multipart/form-data">
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



<!-- PARTIE SERVICES -->
    <form class="form" id="form_services" action="traitement.php" method="post" enctype="multipart/form-data">
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



<!-- PARTIE NEWS -->
    <form class="form" id="form_news" action="traitement.php" method="post" enctype="multipart/form-data">
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



<!-- PARTIE EVENTS -->
    <form class="form" id="form_events" action="traitement.php" method="post">
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



<!-- PARTIE COUNTRIES -->
    <form class="form" id="form_countries" action="traitement.php" method="post" enctype="multipart/form-data">
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


<!-- PARTIE TESTIMONIAL -->
    <form class="form" id="form_testimonial" action="traitement.php" method="post" enctype="multipart/form-data">
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



<!-- PARTIE SEE ALL -->
    <div id="form_all" class="all">
      <h4 class="mb-5 text-uppercase">all :</h4>

      <!-- COUNTRIES -->
      <h4 class="mb-5">Countries :</h4>

      <div class="row row-cols-12">
        <form class="items_form" action="traitement.php" method="post">
      <?php
      // AFFICHAGE
        $countries = $dB->query("SELECT `id_countries`,`image`, `titre`, `contenu` FROM `countries`");
          while($donnees = $countries->fetch()){
      ?>
          <div class="card countriescards bg-light" style="width: 18rem;">
             <img src="images/<?php echo $donnees['image'];?>" class="card-img-top" alt="<?php echo $donnees['image'];?>">
             <div class="card-body">
               <h5 class="card-text"><?php echo $donnees['titre'];?></h5>
               <p class="card-text"><?php echo $donnees['contenu'];?></p>
             </div>
             <button type="submit" class="btn btn-primary" name="editC" value="<?= $donnees['id_countries'] ?>">Edit</button>
             <button type="submit" class="btn btn-danger" name="deleteC" value="<?= $donnees['id_countries'] ?>">Delete</button>
           </div>

        <?php } $countries->closeCursor(); ?>
        </form>
      </div>

      <!-- FEATURED -->
      <h4 class="mb-5 mt-5">Featured :</h4>

      <div class="row row-cols-12">
        <form class="items_form" action="traitement.php" method="post">
      <?php
      // AFFICHAGE
        $featured = $dB->query("SELECT * FROM `featured`");
          while($f = $featured->fetch()){
      ?>
          <div class="card countriescards bg-light" style="width: 18rem;">
             <img src="images/<?php echo $f['image'];?>" class="card-img-top" alt="<?php echo $f['image'];?>">
             <button type="submit" class="btn btn-primary" name="editF" value="<?= $f['id_featured'] ?>">Edit</button>
             <button type="submit" class="btn btn-danger" name="deleteF" value="<?= $f['id_featured'] ?>">Delete</button>
          </div>

        <?php } $featured->closeCursor(); ?>
        </form>
      </div>

      <!-- EVENTS -->
      <h4 class="mb-5 mt-5">Events :</h4>

      <div class="row row-cols-12">
        <form class="items_form" action="traitement.php" method="post">
      <?php
      // AFFICHAGE
        $events = $dB->query("SELECT * FROM `events`");
          while($e = $events->fetch()){
      ?>
      <div class="card eventscards bg-white shadow  shadow-xl p-2" style="width: 18rem;">
        <div class="card-body d-flex flex-row">
          <div class="bg-secondary rounded text-white mr-3" height="50px" width="50px" alt="avatar">
            <p class="card-text text-center mt-1"><?php echo $e['date'];?></p>
          </div>
          <div>
            <h5 class="card-title font-weight-bold mb-2"><?php echo $e['titre'];?></h5>
          </div>
        </div>
        <p class="card-text mr-3 ml-3"><?php echo $e['contenu'];?></p>
        <div class="cardfootevents">
          <a href="#" class="card-link ">Learn more → </a>
          <p class="card-text"><i class="far fa-clock pr-2"></i><?php echo $e['horaires'];?></p>
        </div>
        <button type="submit" class="btn btn-primary" name="editE" value="<?= $e['id_events'] ?>">Edit</button>
        <button type="submit" class="btn btn-danger" name="deleteE" value="<?= $e['id_events'] ?>">Delete</button>
      </div>

    <?php } $events->closeCursor(); ?>
        </form>
      </div>

      <!-- NEWS -->
      <h4 class="mb-5 mt-5">News :</h4>

      <div class="row row-cols-12">
        <form class="items_form" action="traitement.php" method="post">
      <?php
      // AFFICHAGE
        $news = $dB->query("SELECT * FROM `news`");
          while($n = $news->fetch()){
      ?>
      <div class="card shadow shadow-xl newscards" style="width: 18rem;">
        <div class="card-body">
          <img src="images/<?php echo $n['image'];?>" class="card-img-top" alt="<?php echo $n['image'];?>">
          <p class="card-text"><?php echo $n['date'];?></p>
          <h4 class="card-subtitle mb-2 text-muted"><?php echo $n['titre'];?></h4>
        <a href="#" class="card-link">Learn more → </a>
        </div>
        <button type="submit" class="btn btn-primary" name="editN" value="<?= $n['id_news'] ?>">Edit</button>
        <button type="submit" class="btn btn-danger" name="deleteN" value="<?= $n['id_news'] ?>">Delete</button>
      </div>
    <?php } $news->closeCursor(); ?>
        </form>
      </div>

      <!-- SERVICES -->
      <h4 class="mb-5 mt-5">Services :</h4>

      <div class="row row-cols-12">
        <form class="items_form" action="traitement.php" method="post">
      <?php
      // AFFICHAGE
        $services = $dB->query("SELECT * FROM `services`");
          while($s = $services->fetch()){
      ?>
      <div class="card shadow shadow-xl servicescards" style="width: 18rem;">
        <div class="card-body">
          <img src="images/<?php echo $s['icone'];?>">
          <h4 class="card-subtitle mb-2 text-muted"><?php echo $s['titre'];?></h4>
          <p class="card-text"><?php echo $s['contenu'];?></p>
          <a href="#" class="card-link ">Learn more → </a>
        </div>
        <button type="submit" class="btn btn-primary" name="editS" value="<?= $s['id_services'] ?>">Edit</button>
        <button type="submit" class="btn btn-danger" name="deleteS" value="<?= $s['id_services'] ?>">Delete</button>
      </div>
    <?php } $services->closeCursor(); ?>
        </form>
      </div>

      <!-- TESTIMONIAL -->
      <h4 class="mb-5 mt-5">Testimonial :</h4>

      <div class="row row-cols-12">
        <form class="items_form" action="traitement.php" method="post">
      <?php
      // AFFICHAGE
        $testimonial = $dB->query("SELECT * FROM `testimonial`");
          while($t = $testimonial->fetch()){
      ?>
      <div class="card testimonialscards p-2" style="width: 20rem;">
        <div class="card-body d-flex flex-row">
          <img src="images/<?php echo $t['image'];?>" class="rectangle-circle mr-3" height="50px" width="50px" alt="avatar">
          <div>
            <h4 class="card-title font-weight-bold mb-2"><?php echo $t['prenom'];?><?php echo $t['nom'];?></h4>
            <p class="card-text"><?php echo $t['metier'];?></p>
          </div>
        </div>
        <p class="card-text"><?php echo $t['contenu'];?></p>
        <button type="submit" class="btn btn-primary" name="editT" value="<?= $t['id_testimonial'] ?>">Edit</button>
        <button type="submit" class="btn btn-danger" name="deleteT" value="<?= $t['id_testimonial'] ?>">Delete</button>
      </div>
    <?php } $testimonial->closeCursor(); ?>
        </form>
      </div>



    </div>


    <?php


    // UPDATE countries
    if(isset($_SESSION['countriesEd'])){
      $updateCountries = $_SESSION['countriesEd'];

      echo '<h3>Edit :</h3>
      <form class="form" id="form_countries" action="traitement.php" method="post" enctype="multipart/form-data">

        <div class="form-file">
          <input type="file" class="form-file-input" name="new_imageC" id="customfile" value="' .$updateCountries['image']. '">
          <label class="form-file-label" for="customfile">
            <span class="form-file-text">Choose image...</span>
            <span class="form-file-button">Send</span>
          </label>
          <img src="images/' .$updateCountries['image']. '" class="w-50">
        </div><br>

        <label for="title" class="form-label">Title :</label>
        <input class="form-control w-50" type="text" name="new_title" id="title" value="'.$updateCountries['titre'].'"><br>

        <label for="content" class="form-label">Content :</label>
        <textarea class="form-control w-50" rows="5" type="text" name="new_content" id="content">'.$updateCountries['contenu'].'</textarea><br>

        <button type="submit" name="updateC" class="btn btn-primary" value='.$_SESSION['id_editC'].'>Edit</button>
      </form>';
      $_SESSION['countriesEd']= null;
    }


    // UPDATE featured
    if(isset($_SESSION['featuredEd'])){
      $updateFeatured = $_SESSION['featuredEd'];

      echo '<h3>Edit :</h3>
      <form class="form" action="traitement.php" method="post" enctype="multipart/form-data">

        <div class="form-file">
          <input type="file" class="form-file-input" name="new_imageF" id="customFile1" value="' .$updateFeatured['image']. '">
          <label class="form-file-label" for="customFile1">
            <span class="form-file-text">Choose image...</span>
            <span class="form-file-button">Send</span>
          </label>
          <img src="images/' .$updateFeatured['image']. '" class="w-50">
        </div><br>

        <button type="submit" name="updateF" class="btn btn-primary" value='.$_SESSION['id_editF'].'>Edit</button>
      </form>';
      $_SESSION['featuredEd']= null;
    }




    // UPDATE events
    if(isset($_SESSION['eventsEd'])){
      $updateEvents = $_SESSION['eventsEd'];

      echo '<h3>Edit :</h3>
      <form class="form" action="traitement.php" method="post">

        <label for="date" class="form-label">Date :</label>
        <input class="form-control w-50" type="date" name="new_date" id="date" value="'.$updateEvents['date'].'"></input><br>

        <label for="title" class="form-label">Title :</label>
        <input class="form-control w-50" type="text" name="new_title" id="title" value="'.$updateEvents['titre'].'"><br>

        <label for="content" class="form-label">Content :</label>
        <textarea class="form-control w-50" rows="5" type="text" name="new_content" id="content">'.$updateEvents['contenu'].'</textarea><br>

        <label for="hours" class="form-label">Hours :</label>
        <input class="form-control w-50" type="time" name="new_hours" id="hours" value="'.$updateEvents['horaires'].'"><br>

        <button type="submit" name="updateE" class="btn btn-primary" value='.$_SESSION['id_editE'].'>Edit</button>
      </form>';
      $_SESSION['eventsEd'] = null;
    }



    // UPDATE news
    if(isset($_SESSION['newsEd'])){
      $updateNews = $_SESSION['newsEd'];

      echo '<h3>Edit :</h3>
      <form class="form" action="traitement.php" method="post" enctype="multipart/form-data">

        <div class="form-file">
          <input type="file" class="form-file-input" name="new_imageN" id="customFil" value="' .$updateNews['image']. '">
          <label class="form-file-label" for="customFil">
            <span class="form-file-text">Choose image...</span>
            <span class="form-file-button">Send</span>
          </label>
          <img src="images/' .$updateNews['image']. '" class="w-50">
        </div><br>

        <label for="date" class="form-label">Date :</label>
        <input class="form-control w-50" type="date" name="new_date" id="date" value="' .$updateNews['date']. '"></input><br>

        <label for="title" class="form-label">Title :</label>
        <input class="form-control w-50" type="text" name="new_title" id="title" value="' .$updateNews['titre']. '"><br>

        <button type="submit" name="updateN" class="btn btn-primary" value='.$_SESSION['id_editN'].'>Edit</button>
      </form>';
      $_SESSION['newsEd'] = null;
    }


    // UPDATE services
    if(isset($_SESSION['servicesEd'])){
      $updateServices = $_SESSION['servicesEd'];

      echo '<h3>Edit :</h3>
      <form class="form" action="traitement.php" method="post" enctype="multipart/form-data">

        <div class="form-file">
          <input type="file" class="form-file-input" name="new_icon" id="custoFile" value="' .$updateServices['icone']. '">
          <label class="form-file-label" for="custoFile">
            <span class="form-file-text">Choose icon...</span>
            <span class="form-file-button">Send</span>
          </label>
          <img src="images/' .$updateServices['icone']. '" class="w-50">
        </div><br>

        <label for="title" class="form-label">Title :</label>
        <input class="form-control w-50" type="text" name="new_title" id="title" value="' .$updateServices['titre']. '"><br>

        <label for="content" class="form-label">Content :</label>
        <textarea class="form-control w-50" rows="5" type="text" name="new_content" id="content">' .$updateServices['contenu']. '</textarea><br>

        <button type="submit" name="updateS" class="btn btn-primary" value='.$_SESSION['id_editS'].'>Edit</button>
      </form>';
      $_SESSION['servicesEd'] = null;
    }


    // UPDATE testimonial
    if(isset($_SESSION['testimonialEd'])){
      $updateTestimonial = $_SESSION['testimonialEd'];

      echo '<h3>Edit :</h3>
      <form class="form" action="traitement.php" method="post" enctype="multipart/form-data">

        <div class="form-file">
          <input type="file" class="form-file-input" name="new_imageT" id="customFile2" value="' .$updateTestimonial['image']. '">
          <label class="form-file-label" for="customFile2">
            <span class="form-file-text">Choose image...</span>
            <span class="form-file-button">Send</span>
          </label>
          <img src="images/' .$updateTestimonial['image']. '" class="w-50">
        </div><br>

        <label for="firstname" class="form-label">Firstname :</label>
        <input class="form-control w-50" type="text" name="new_firstname" id="firstname" value="' .$updateTestimonial['prenom']. '"></input><br>

        <label for="lastname" class="form-label">Lastname :</label>
        <input class="form-control w-50" type="text" name="new_lastname" id="lastname" value="' .$updateTestimonial['nom']. '"><br>

        <label for="job" class="form-label">Job :</label>
        <input class="form-control w-50" type="text" name="new_job" id="job" value="' .$updateTestimonial['metier']. '"><br>

        <label for="content" class="form-label">Content :</label>
        <textarea class="form-control w-50" rows="5" type="time" name="new_content" id="content">' .$updateTestimonial['contenu']. '</textarea><br>

        <button type="submit" name="updateT" class="btn btn-primary" value='.$_SESSION['id_editT'].'>Edit</button>
      </form>';
      $_SESSION['testimonialEd'] = null;
    }


    ?>


  </div>

</div>





<?php include 'footer.php';?>
