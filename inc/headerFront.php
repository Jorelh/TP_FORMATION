<?php // headerFront.php
  require 'inc/form.php';
  include 'inc/db.php';

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
                  echo $form->input('Rechercher');
                  ?>

                  <input type="checkbox" name="category" value="category">Catégories <br>
                  <input type="checkbox" name="actor" value="actor">Acteur <br>
                  <input type="checkbox" name="director" value="director">Réalisateur <br>  
                  <input type="checkbox" name="selectAll">Tout séléctionner <br>

                  <label for="">Années : </label>
                  <select name="Annee" class="annee">
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
                  <label for="">Popularité : </label>
                  <select name="Populatite">
                    <?php
                    echo $form->select('0 à 10');
                    echo $form->select('10 à 20');
                    echo $form->select('20 à 30');
                    echo $form->select('40 à 50');
                    echo $form->select('50 à 60');
                    echo $form->select('60 à 70');
                    echo $form->select('70 à 80');
                    echo $form->select('80 à 90');
                    echo $form->select('90 à 100');
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
                  ?>
                </div>

                <div class="inputnav">
                  <?php
                  echo $form->checkbox('Thriller');
                  echo $form->checkbox('Crime');
                  echo $form->checkbox('Destiny');
                  echo $form->checkbox('Documentary');
                  echo $form->checkbox('Drama');
                  echo $form->checkbox('Family');
                  echo $form->checkbox('Gangster');
                  ?>
                </div>

                <div class="inputnav">
                  <?php
                  echo $form->checkbox('Justice');
                  echo $form->checkbox('Tragedy');
                  echo $form->checkbox('Martial Arts');
                  echo $form->checkbox('Melodrama');
                  echo $form->checkbox('Music Halls');
                  echo $form->checkbox('Political');
                  echo $form->checkbox('Romance');
                  ?>
                </div>

                <div class="inputnav">
                  <?php
                  echo $form->checkbox('Romantic');
                  echo $form->checkbox('Satire');
                  echo $form->checkbox('Sci-Fi');
                  echo $form->checkbox('Secret Services');
                  echo $form->checkbox('Social Study');
                  echo $form->checkbox('Gore');
                  echo $form->checkbox('Sport');
                  ?>
                </div>

              </form>
            </section>
          </div>

    </header>
