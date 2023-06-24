<?php

try {
    $conection= new PDO("mysql:host=localhost;dbname=construction","root","");
} catch (PDOException $th) {
    $th->getMessage();
}

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['sexe']) && !empty($_POST['age'])) {
        $sql=$conection->prepare("INSERT INTO client (name, firstname, sexe, age) VALUES (:name, :firstname, :sexe, :age)");
        $execution=$sql->execute(array(':name'=>$_POST['name'],':firstname'=>$_POST['firstname'],':sexe'=>$_POST['sexe'],':age'=>$_POST['age']));
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
    <h1>Ajouter client</h1>
   <div class="cadre">
    <form action="" method="post">
         
        <input type="text" name="name" id="nom" placeholder="NOM">
        <input type="text" name="firstname" id="firstname" placeholder="Prénom">
       <div class="flex">
        <select id="sexe" name="sexe">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select>
        </div>
        <input type="number" name="age">
        <input type="submit" name="envoyer" id="envoyer">
    </form>
      </div>
</body>
</html>