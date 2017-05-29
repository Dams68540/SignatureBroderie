<?php

require_once 'BDD.php';

class Article extends \BDD
{
    public function AddArticle()
    {
        if (isset($_POST['ajouter'])) {

            if (!empty($_POST['nomAdd']) && !empty($_POST['descriptionAdd']) && !empty($_POST['couleurAdd'])) {
                $addArt = $this->bdd->prepare('INSERT INTO Article(Nom, Description, Couleur) VALUES (?, ?, ?)');
                $addArt->execute(array($_POST['nomAdd'], $_POST['descriptionAdd'], $_POST['couleurAdd']));
            }
        }
    }

    public function SelectArticle()
    {
        return $this->bdd
            ->query('SELECT * FROM Article')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public function EditArticle()
    {
        if (isset($_POST['editer']) && isset($_POST['Nom']) && isset($_POST['Description']) && isset($_POST['Couleur']))
        {
            $edit = $this->bdd->prepare('UPDATE Article SET Nom = ?, Description = ?, Couleur = ? WHERE id = ?');
            $edit->execute(array($_POST['Nom'], $_POST['Description'], $_POST['Couleur'], $_POST['editer']));
        }
    }

    public function DeleteArticle()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM Article WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }
}