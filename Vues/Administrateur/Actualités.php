<?php
// require
require '../../Fonctions/Actualités.php';
// init
$actualite = new Actualites();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualités</title>
</head>
<body>

<a href="AccueilAdmin.php">Accueil</a>
<p>
    <?php

        $actualite->AddActualite();
        $actualite->EditActualite();
        $actualite->DeleteActualite();

    ?>
</p>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Date pub</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php

    foreach ($actualite->SelectActualite() as $Actu) {
        echo '<form method="post" action="">';
        echo '<tr><td>' . $Actu->id . '</textarea></td>';
        echo '<td><textarea name="titre" cols="80" rows="5">' . htmlentities($Actu->Titre) . '</textarea></td>';
        echo '<td>' . htmlentities($Actu->Date) . '</input></td>';
        echo '<td><button type="submit" name="Supprimer" value="' . $Actu->id . '">Supprimer</button><button type="submit" name="editer" value="' . $Actu->id . '">Éditer</button></td>';
        echo '</form>';
    }

    ?>


    <form method="post" action="">
        <tr>
            <td></td>
            <td><textarea name="titreAdd" placeholder="Titre" cols="50" rows="3"></textarea></td>
            <td></td>
            <td><input type="submit" name="Ajouter" value="Ajouter"></td>
        </tr>
    </form>


    </tbody>
</table>

</body>
</html>
