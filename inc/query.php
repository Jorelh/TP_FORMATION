<?php


//Fonction qui ressort 12 films aléatoirement pour la page d'accueil
function randomMovies(){
  global $pdo;
    $sql="SELECT * FROM movies_full ORDER BY RAND() LIMIT 12";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchall();
    return $result;
}

//Fonction qui renvoie l'intégrale des détails du film
function getMovie($id){
  global $pdo;
    $sql="SELECT * FROM movies_full WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':id',$id, PDO::PARAM_STR);
    $stmt->execute();
    $result=$stmt->fetch();
    return $result;
}
