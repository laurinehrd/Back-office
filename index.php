<?php include 'header.php' ?>

<div class="container mt-3">

  <button type="button" class="btn btn-primary btn-lg" onclick="connexion()">Se connecter</button>
  <button type="button" class="btn btn-secondary btn-lg" onclick="inscription()">S'inscrire</button>



  <div class="connexion mt-5" id="connexion">
    <h2>Connexion</h2>
    <form action="index.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email">
      </div>
      <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <div class="inscription mt-5" id="inscription">
    <h2>Inscription</h2>
    <form action="index.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Veuillez saisir à nouveau votre mot de passe</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>








<?php include 'footer.php' ?>
