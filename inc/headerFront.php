<?php // headerFront.php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700|Lora:700,400' rel='stylesheet' type='text/css'>
    <script type="text/javascript" href="style/app.js">

    </script>
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

      <ul class="navsearch">
        <li><a href="#">Recherche</a>
        <form class="dropdown">
          <input type="text" name="search" placeholder="rechercher">
          <input type="checkbox" name="Titre" checked="checked" value="Titre">Titre
          <input type="checkbox" name="Realisateur" checked="checked" value="Réalisateur">Réalisateur
          <input type="checkbox" name="Acteurs" checked="checked" value="Acteurs">Acteurs
          <input type="submit" name="rechercher" value="Rechercher" class="button">
        </form></li>
      </ul>

      <ul class="navright">
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>
      </ul>
    </header>
