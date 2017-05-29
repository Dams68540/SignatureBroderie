<?php
require '../../Fonctions/BDD.php';
require '../../Fonctions/Descriptions.php';
require '../../Fonctions/Categories.php';
require '../../Fonctions/Article.php';

$bdd = new BDD();
$description = new Description();
$categorie = new Categories();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrateur</title>
</head>
<body>

<a href="Description.php"> Descriptions</a>
<a href="Categories.php"> Catégories </a>
<a href="Article.php"> Articles </a>
<a href="Actualités.php"> Actualités </a>
<a href="#"> Vue Utilisateur </a>


</body>
</html>
