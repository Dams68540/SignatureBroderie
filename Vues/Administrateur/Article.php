<?php

require '../../Fonctions/Article.php';

$article = new Article();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Articles</title>
</head>
<body>

<a href="AccueilAdmin.php">Accueil</a>

<p>
    <?php

        $article->AddArticle();
        $article->EditArticle();
        $article->DeleteArticle();

    ?>
</p>

<table>
    <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Couleur</th>
    </tr>
    <?php

    foreach ($article->SelectArticle() as $art)
    {
        echo '<form action="" method="POST">';
        echo '<tr><td><textarea name="Nom" cols="50" rows="5">'. htmlentities($art->Nom).'</textarea></td>';
        echo '<td><textarea name="Description" cols="80" rows="5">'. htmlentities($art->Description).'</textarea></td>';
        echo '<td><textarea name="Couleur" cols="30" rows="5">'. htmlentities($art->Couleur).'</textarea></td>';
        echo '<td><button type="submit" name="editer" value="'.$art->id.'">Modifier</button></td>';
        echo '<td><button type="submit" name="Supprimer" value="' . $art->id . '">Supprimer</button></td></tr>';
        echo '</form>';
    }

    ?>
    <tr>
        <form action="" method="POST">
            <td>
                <textarea name="nomAdd" cols="50" rows="5" placeholder="Le nom de l'article...(500 caractères)"></textarea>
            </td>
            <td>
                <textarea name="descriptionAdd" cols="80" rows="5" placeholder="La description...(20 000 caractères)"></textarea>
            </td>
            <td>
                <textarea name="couleurAdd" cols="30" rows="5" placeholder="La couleur..."></textarea>
            </td>
            <td>
                <input type="submit" name="ajouter" value="Ajouter">
            </td>
        </form>
    </tr>
</table>

</body>
</html>