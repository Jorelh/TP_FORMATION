<?php // headerFront.php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
<<<<<<< Updated upstream
=======
    <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
>>>>>>> Stashed changes
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

                  <input type="text" name="search" placeholder="rechercher"><br>

                  <input type="checkbox" name="selectAll">Tout séléctionner <br>

                  <input type="checkbox" name="category" value="category">Catégories <br>
                  <input type="checkbox" name="actor" value="actor">Acteur <br>
                  <input type="checkbox" name="director" value="director">Réalisateur <br>

                  <input type="submit" name="rechercher" value="Go!" class="buttonsearch">
                </div>

                <div class="inputnav">
                  <input type="checkbox" checked="checked" name="action" value="action">Action <br>
                  <input type="checkbox" checked="checked" name="adventure" value="adventure">Aventure <br>
                  <input type="checkbox" checked="checked" name="biography" value="biography">Biographie <br>
                  <input type="checkbox" checked="checked" name="comedy" value="comedy">Comedie <br>
                  <input type="checkbox" checked="checked" name="coming_of_age" value="coming_of_age">coming_of_age <br>
                  <input type="checkbox" checked="checked" name="coming_out" value="coming_out">Coming Out <br>
                  <input type="checkbox" checked="checked" name="computer_animation" value="computer_animation">Animation <br>
                  <input type="checkbox" checked="checked" name="thriller" value="thriller">Thriller <br>
                </div>

                <div class="inputnav">
                  <input type="checkbox" checked="checked" name="crime" value="crime">Crime <br>
                  <input type="checkbox" checked="checked" name="destiny" value="destiny">Destin <br>
                  <input type="checkbox" checked="checked" name="documentary" value="documentary">Documentaire <br>
                  <input type="checkbox" checked="checked" name="drama" value="drama">Drame <br>
                  <input type="checkbox" checked="checked" name="family" value="family">Famille <br>
                  <input type="checkbox" checked="checked" name="gangster" value="gangster">Gangster <br>
                  <input type="checkbox" checked="checked" name="justice" value="justice">Justice <br>
                  <input type="checkbox" checked="checked" name="tragedy" value="tragedy">Tragedie <br>
                </div>

                <div class="inputnav">
                  <input type="checkbox" checked="checked" name="martial_arts" value="martial_arts">Arts-martiaux <br>
                  <input type="checkbox" checked="checked" name="melodrama" value="melodrama">Melodrame <br>
                  <input type="checkbox" checked="checked" name="music_halls" value="music_halls">Music Hall <br>
                  <input type="checkbox" checked="checked" name="political" value="political">Politique <br>
                  <input type="checkbox" checked="checked" name="romance" value="romance">Romance <br>
                  <input type="checkbox" checked="checked" name="romantic" value="romantic">Romantique <br>
                  <input type="checkbox" checked="checked" name="satire" value="satire">Satire <br>
                  <input type="checkbox" checked="checked" name="sci_fi" value="sci_fi">Science Fiction <br>
                </div>

                <div class="inputnav">
                  <input type="checkbox" checked="checked" name="secret_services" value="secret_services">Services Secrets <br>
                  <input type="checkbox" checked="checked" name="social_study" value="social_study">Social <br>
                  <input type="checkbox" checked="checked" name="gore" value="gore">Gore <br>
                  <input type="checkbox" checked="checked" name="sport_film" value="sport_film">Sports <br>
                  <input type="checkbox" checked="checked" name="gore" value="gore">Gore <br>
                  <input type="checkbox" checked="checked" name="sport_film" value="sport_film">Sports <br>
                </div>

              </form>
            </section>
          </div>

    </header>
