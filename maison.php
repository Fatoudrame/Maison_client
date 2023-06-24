<?php

try {
    $conection= new PDO("mysql:host=localhost;dbname=construction","root","");
} catch (PDOException $th) {
    $th->getMessage();
}

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['quartier']) && !empty($_POST['ville']) && !empty($_POST['proprietaire'])) {
        $sql=$conection->prepare("INSERT INTO maison (quartier, ville, proprietaire) VALUES (:quartier, :ville, :proprietaire)");
        $execution=$sql->execute(array(':quartier'=>$_POST['quartier'],':ville'=>$_POST['ville'],':proprietaire'=>$_POST['proprietaire']));
        if (!$execution) {
            echo "Echec!";
        }else {
            echo 'Executé!';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\style.css">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter maison</h1>
    <div class="cadre">
    <form action="" method="post">
         
        <input type="text" name="quartier" id="quartier" placeholder="Quartier">
        <input type="text" name="ville" id="ville" placeholder="Ville">
        <input type="number" name="proprietaire" placeholder="id_proprietaire">
        <input type="submit" name="envoyer" id="envoyer">
    </form>
      </div>
</body>
</html>