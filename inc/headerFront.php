<?php // headerFront.php
  require 'test/form.php';

  //On définit $form comme étant un nouveau formulaire
  $form = new form($_POST);

  //protection de la recherche
  if(!empty($_GET['Recherche'])){
  $recherche = trim(strip_tags($_GET['Recherche']));
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700|Lora:700,400' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <title>Flimflix</title>
  </head>
  <body>

    <header>
      <h1>Flimflix</h1>

      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Flims vus</a></li>
        <li><a href="#">Flims à voir</a></li>
      </ul>

        <button class="buttonsearch" type="button" name="search">Recherche</button>

        <ul class="navright">
          <li><a href="connexion.php">Connexion</a></li>
          <li><a href="inscription.php">Inscription</a></li>
        </ul>

          <div class="dropdown hide" name="dropdown">
            <section class="wrapper">
              <form class="navsearch" method="GET" action="#">

                <div class="inputnav">
                  <?php
                  echo $form->input('search');
                  ?>
                  <!-- <input type="text" name="search" placeholder="rechercher"><br> -->

                  <input type="checkbox" name="selectAll">Tout séléctionner <br>

                  <input type="checkbox" name="category" value="category">Catégories <br>
                  <input type="checkbox" name="actor" value="actor">Acteur <br>
                  <input type="checkbox" name="director" value="director">Réalisateur <br>
                  <select name="Annee">
                    <?php
                    echo $form->select('avant 1920');
                    echo $form->select('1920 à 1930');
                    echo $form->select('1930 à 1940');
                    echo $form->select('1940 à 1950');
                    echo $form->select('1950 à 1960');
                    echo $form->select('1960 à 1970');
                    echo $form->select('1970 à 1980');
                    echo $form->select('1980 à 1990');
                    echo $form->select('1990 à 2000');
                    echo $form->select('2000 à 2010');
                    echo $form->select('après 2010');
                    ?>
                  </select>
                  <input type="submit" name="rechercher" value="Go!" class="buttonsearch">
                </div>

                <div class="inputnav">
                  <?php
                  echo $form->checkbox('Action');
                  echo $form->checkbox('Adventure');
                  echo $form->checkbox('Animation');
                  echo $form->checkbox('Biography');
                  echo $form->checkbox('Comedy');
                  echo $form->checkbox('Coming Of Age');
                  echo $form->checkbox('Coming Out');
                  echo $form->checkbox('Thriller');
                  ?>
                  <!-- <input type="checkbox" checked="checked" name="action" value="action">Action <br>
                  <input type="checkbox" checked="checked" name="adventure" value="adventure">Aventure <br>
                  <input type="checkbox" checked="checked" name="biography" value="biography">Biographie <br>
                  <input type="checkbox" checked="checked" name="comedy" value="comedy">Comedie <br>
                  <input type="checkbox" checked="checked" name="coming_of_age" value="coming_of_age">coming_of_age <br>
                  <input type="checkbox" checked="checked" name="coming_out" value="coming_out">Coming Out <br>
                  <input type="checkbox" checked="checked" name="computer_animation" value="computer_animation">Animation <br>
                  <input type="checkbox" checked="checked" name="thriller" value="thriller">Thriller <br> -->
                </div>

                <div class="inputnav">
                  <?php
                  echo $form->checkbox('Crime');
                  echo $form->checkbox('Destiny');
                  echo $form->checkbox('Documentary');
                  echo $form->checkbox('Drama');
                  echo $form->checkbox('Family');
                  echo $form->checkbox('Gangster');
                  echo $form->checkbox('Justice');
                  echo $form->checkbox('Tragedy');
                  ?>
                  <!-- <input type="checkbox" checked="checked" name="crime" value="crime">Crime <br>
                  <input type="checkbox" checked="checked" name="destiny" value="destiny">Destin <br>
                  <input type="checkbox" checked="checked" name="documentary" value="documentary">Documentaire <br>
                  <input type="checkbox" checked="checked" name="drama" value="drama">Drame <br>
                  <input type="checkbox" checked="checked" name="family" value="family">Famille <br>
                  <input type="checkbox" checked="checked" name="gangster" value="gangster">Gangster <br>
                  <input type="checkbox" checked="checked" name="justice" value="justice">Justice <br>
                  <input type="checkbox" checked="checked" name="tragedy" value="tragedy">Tragedie <br> -->
                </div>

                <div class="inputnav">
                  <?php
                  echo $form->checkbox('Martial Arts');
                  echo $form->checkbox('Melodrama');
                  echo $form->checkbox('Music Halls');
                  echo $form->checkbox('Political');
                  echo $form->checkbox('Romance');
                  echo $form->checkbox('Romantic');
                  echo $form->checkbox('Satire');
                  echo $form->checkbox('Sci-Fi');
                  ?>
                  <!-- <input type="checkbox" checked="checked" name="martial_arts" value="martial_arts">Arts-martiaux <br>
                  <input type="checkbox" checked="checked" name="melodrama" value="melodrama">Melodrame <br>
                  <input type="checkbox" checked="checked" name="music_halls" value="music_halls">Music Hall <br>
                  <input type="checkbox" checked="checked" name="political" value="political">Politique <br>
                  <input type="checkbox" checked="checked" name="romance" value="romance">Romance <br>
                  <input type="checkbox" checked="checked" name="romantic" value="romantic">Romantique <br>
                  <input type="checkbox" checked="checked" name="satire" value="satire">Satire <br>
                  <input type="checkbox" checked="checked" name="sci_fi" value="sci_fi">Science Fiction <br> -->
                </div>

                <div class="inputnav">
                  <?php
                  echo $form->checkbox('Secret Services');
                  echo $form->checkbox('Social Study');
                  echo $form->checkbox('Gore');
                  echo $form->checkbox('Sport');
                  ?>
                  <!-- <input type="checkbox" checked="checked" name="secret_services" value="secret_services">Services Secrets <br>
                  <input type="checkbox" checked="checked" name="social_study" value="social_study">Social <br>
                  <input type="checkbox" checked="checked" name="gore" value="gore">Gore <br>
                  <input type="checkbox" checked="checked" name="sport_film" value="sport_film">Sports <br>
                  <input type="checkbox" checked="checked" name="gore" value="gore">Gore <br>
                  <input type="checkbox" checked="checked" name="sport_film" value="sport_film">Sports <br> -->
                </div>



              </form>
            </section>
          </div>

    </header>
