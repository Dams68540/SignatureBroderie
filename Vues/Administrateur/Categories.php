<?php

require '../../Fonctions/Categories.php';

$category = new Categories();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Catégories</title>
</head>
<body>

<a href="AccueilAdmin.php">Accueil</a>

<p>
    <?php

        $category->AddCategories();
        $category->EditCategories();
        $category->DeleteCategories();

    ?>
</p>

<table>
    <tr>
        <th>ID</th>
        <th>Catégories</th>
    </tr>


        <?php

        foreach ($category->SelectCategories() as $Cat)
        {
            echo '<form method="post" action="">';
            echo '<tr><td>'. $Cat->id . '</textarea></td>';
            echo '<td><textarea name="texte" cols="70" rows="5">' . htmlentities($Cat->Cate) . '</textarea></td>';
            echo '<td><button type="submit" name="Supprimer" value="' . $Cat->id . '">Supprimer</button></td>';
            echo '<td><button type="submit" name="editer" value="'.$Cat->id.'">Éditer</button></td></tr>';
            echo '</form>';
        }

        ?>


    <form method="post" action="">
        <tr>
            <td></td>
            <td><textarea name="CateAdd" placeholder="Titre" cols="50" rows="3"></textarea></td>
            <td><input type="submit" name="Ajouter" value="Ajouter"></td>
    </form>

    </tr>
</table>

</body>
</html>
