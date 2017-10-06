<?php

namespace Mini\Model;

use Mini\Core\Model;

class Articles extends Model
{
    public function AddArticles()
    {

        if (isset($_POST['ajouter'])) {
            if (!empty($_POST['nomAdd']) && !empty($_POST['descriptionAdd']) && !empty($_POST['couleurAdd']) && !empty($_POST['categorieAdd'])) {

                if ($_FILES['upload']['error'] == 0) {

                    if ($_FILES['upload']['size'] <= 1048576) {

                        $extensions_valides = array('jpg', 'png'); // -- there we can add other extensions -- \\
                        $extension_upload = strtolower(substr(strrchr($_FILES['upload']['name'], '.'), 1));

                        if (in_array($extension_upload, $extensions_valides)) {

                            $id = $this->bdd->query("SELECT id FROM articles ORDER BY id DESC");
                            $id = $id->fetch()->id + 1;

                            $extension = new \SplFileInfo($_FILES['upload']['name']);
                            $extension = $id . '.' . $extension->getExtension();
                            $nom = "../public//img/articles/{$extension}";
                            $resultat = move_uploaded_file($_FILES['upload']['tmp_name'], $nom);

                            if ($resultat) {

                                $addArt = $this->bdd->prepare('INSERT INTO articles(nom, description, couleur, categorie, id_image) VALUES (?, ?, ?, ?, ?)');
                                $addArt->execute(array($_POST['nomAdd'], $_POST['descriptionAdd'], $_POST['couleurAdd'], $_POST['categorieAdd'], $extension));

                                if ($addArt) {

                                    echo '<script>alert("Succès lors de l\'ajout.")</script>';
                                } else {

                                    echo '<script>alert("Une erreur est survenue. Veuillez réessayer.")</script>';
                                }
                            } else
                                echo '<script>alert("Le transfert a échoué, veuillez réessayer.")</script>';
                        } else
                            echo '<script>alert("Seul le format JPG est accepté.")</script>';
                    } else
                        echo '<script>alert("Le fichier choisi est trop volumineux, la taille maximum est de 1 Mo.")</script>';
                } else
                    echo '<script>alert("Une erreur est survenue lors de la reception de l\'image, veuillez réessayer.")</script>';
            }
            else
            {
                echo '<script>alert("Veuillez remplir tous les champs !")</script>';
            }
        }
    }

    public function Articles()
    {
        return $this->bdd
            ->query("SELECT * FROM articles ORDER BY id DESC")
            ->fetchAll();
    }

    public function SelectArticle($category = null)
    {
        if ($category == null && isset($_POST['envoyer']) && !empty($_POST['categorie']))
        {
            $Categorie = $_POST['categorie'];

            return $this->bdd
                ->query("SELECT * FROM articles WHERE categorie ='$Categorie'")
                ->fetchAll();
        }
        else if(isset($_POST['afficherTout']))
        {
            header('refresh:0');
        }
        else if ($category != null)
        {
            return $this->bdd
                ->query("SELECT * FROM articles WHERE categorie = '$category'")
                ->fetchAll();
        }
    }

    public function SelectArt($id_art = null)
    {
        if ($id_art == null)
        {
            return $this->bdd
                ->query('SELECT id, titre, id_image FROM articles ORDER BY id DESC LIMIT 0, 10')
                ->fetchAll();
        }
        else
        {
            return $this->bdd
                ->query("SELECT id, nom, description, couleur, categorie, id_image FROM articles WHERE id='$id_art'")
                ->fetch();
            exit();
        }
    }

    public function EditArticle()
    {
        if (isset($_POST['editer']) && isset($_POST['Nom']) && isset($_POST['Description']) && isset($_POST['Couleur']) && isset($_POST['Categorie']))
        {
            $edit = $this->bdd->prepare('UPDATE articles SET nom = ?, description = ?, couleur = ?, categorie = ? WHERE id = ?');
            $edit->execute(array($_POST['Nom'], $_POST['Description'], $_POST['Couleur'], $_POST['Categorie'], $_POST['editer']));
        }
    }

    public function DeleteArticle()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM articles WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }

}