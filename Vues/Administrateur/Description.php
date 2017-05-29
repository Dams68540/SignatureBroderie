<?php

require '../../Fonctions/Descriptions.php';

$description = new Description();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Description</title>
</head>
<body>

<a href="AccueilAdmin.php">Accueil</a>
<p>
    <?php

        $description->AddDescription();
        $description->EditDescription();
        $description->DeleteDescription();

    ?>
</p>
<table>
    <tr>
        <th>Titre</th>
        <th>Description</th>
    </tr>

<?php

foreach ($description->SelectDescription() as $des)
{
    echo '<form method="post" action="">';
    echo '<tr><td><textarea name="titre" placeholder="Titre" cols="50" rows="5">'. htmlentities($des->Titre) . '</textarea></td>';
    echo '<td><textarea name="texte" cols="140" rows="5">' . htmlentities($des->Texte) . '</textarea></td>';
    echo '<td><button type="submit" name="Supprimer" value="' . $des->id . '">Supprimer</button></td>';
    echo '<td><button type="submit" name="editer" value="'.$des->id.'">Editer</button></td></tr>';
    echo '</form>';
}

?>


<form method="post" action="">
<tr>

    <td><textarea name="titreAdd" placeholder="Titre" cols="50" rows="3"></textarea></td>
    <td><textarea name="texteAdd" placeholder="Votre description..." cols="140" rows="3"></textarea></td>
    <td><input type="submit" name="ajouter" value="Ajouter"></td>
</form>

</tr>
</table>

</body>
</html>
