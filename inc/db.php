<?php

//Connexion a la base de donnée
    try {
            $pdo = new PDO('mysql:host=localhost;dbname=dbtpgroup', "root", "", array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
        }
        catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }


        //-------------------------//
        //   CREATION DES TABLES   //
        //-------------------------//
        //On crée la table users
        $pdo->exec("CREATE TABLE IF NOT EXISTS `users`(
        `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `pseudo` varchar(100) NOT NULL,
        `email` varchar(100) NOT NULL,
        `password` varchar(255) NOT NULL,
        `token` varchar(255) NOT NULL,
        `created_at` datetime NOT NULL,
        `role` varchar (50) NOT NULL,
        CONSTRAINT pseudo UNIQUE(pseudo),
        CONSTRAINT email UNIQUE(email)
        )");

        //On crée la table notes
        $pdo->exec("CREATE TABLE IF NOT EXISTS `notes`(
        `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `id_user` int(11) NOT NULL,
        `id_film` int(11) NOT NULL,
        `note` int(3) NOT NULL
        )");
