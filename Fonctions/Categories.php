<?php

require_once 'BDD.php';

class Categories extends \BDD
{
    public function AddCategories()
    {
        if (isset($_POST['Ajouter']))
        {
            if (!empty($_POST['CateAdd']))
            {
                $reqCat = $this->bdd->prepare('INSERT INTO Categories(Cate) VALUE (?)');
                $reqCat->execute(array($_POST['CateAdd']));
            }
        }
    }

    public function SelectCategories()
    {
        return $this->bdd
            ->query('SELECT * FROM Categories')
            ->fetchAll();
    }

    public function EditCategories()
    {
            if (isset($_POST['texte']) && isset($_POST['editer']))
            {
                $edit = $this->bdd->prepare('UPDATE Categories SET Cate = ? WHERE id = ?');
                $edit->execute(array($_POST['texte'], $_POST['editer']));
            }
    }

    public function DeleteCategories()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM Categories WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }
}