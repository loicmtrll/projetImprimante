<?php

  require "fonction.php";

  $erreur = "";

  if (filter_has_var(INPUT_POST,'btnInscription')) {

    $nom = filter_input(INPUT_POST, 'nomUser',FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenomUser', FILTER_SANITIZE_STRING);
    $mail = filter_input(INPUT_POST, 'mailUser', FILTER_VALIDATE_EMAIL);
    $mdp = filter_input(INPUT_POST, 'mdpUser', FILTER_SANITIZE_STRING);
    $mdp2 = filter_input(INPUT_POST, 'mdpUser2', FILTER_SANITIZE_STRING);


    if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp) && !empty($mdp2)) {
      if (veriferMail($mail) == true) {
        if ($mdp == $mdp2) {
           creerUser($nom, $prenom, $mail, $mdp);
           $erreur = "Le compte a été créé.";
        }else {
          $erreur = "Les mots de passe ne se corespondent pas.";
        }
      }else {
        $erreur = "L'adresse mail est déjà utilisée.";
      }
    }else {
      $erreur = "Veuillez remplir les champs.";
    }


  }
?>
<!DOCTYPE html>
<html>
<title>Imprimante 3D EEI</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="index.php" class="w3-bar-item w3-button"><b>Imprimante 3D</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#projects" class="w3-bar-item w3-button">Deconnexion</a>
      <a href="#about" class="w3-bar-item w3-button">Inscription</a>
      <a href="#contact" class="w3-bar-item w3-button">Connexion</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;margin-top:100px;" id="home">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Imprimante</b></span> <span class="w3-hide-small w3-text-light-grey">3D</span></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Formulaire d'inscription</h3>
    <p><?php echo $erreur; ?></p>
    <form action="" method="POST">
      <input class="w3-input w3-border" type="text" placeholder="Nom" required name="nomUser"><br>
      <input class="w3-input w3-border" type="text" placeholder="Prénom" required name="prenomUser"><br>
      <input class="w3-input w3-border" type="text" placeholder="E-mail" required name="mailUser"><br>
      <input class="w3-input w3-border" type="password" placeholder="Mot de passe" required name="mdpUser"><br>
      <input class="w3-input w3-border" type="password" placeholder="Confirmer mot de passe" required name="mdpUser2">
      <input class="w3-button w3-black w3-section" type="submit" name="btnInscription" value="INSCRIPTION">
    </form>
  </div>





<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
</body>
</html>
