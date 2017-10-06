<?php

namespace Mini\Model;

use Mini\Core\Model;

class Categorie extends Model
{
    public function AddCategories()
    {
        if (isset($_POST['Ajouter']))
        {
            if (!empty($_POST['CateAdd']))
            {
                $reqCat = $this->bdd->prepare('INSERT INTO categories(cate) VALUE (?)');
                $reqCat->execute(array($_POST['CateAdd']));
            }
        }
    }

    public function SelectCategories()
    {
        return $this->bdd
            ->query('SELECT * FROM categories')
            ->fetchAll();
    }

    public function EditCategories()
    {
        if (isset($_POST['texte']) && isset($_POST['editer']))
        {
            $edit = $this->bdd->prepare('UPDATE categories SET cate = ? WHERE id = ?');
            $edit->execute(array($_POST['texte'], $_POST['editer']));
        }
    }

    public function DeleteCategories()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM categories WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }
}