<?php

namespace Mini\Model;

use Mini\Core\Model;

class Promotion extends Model
{
    public function AddPromo()
    {
        if (isset($_POST['Ajouter']))
        {
            if (!empty($_POST['PromoAdd']))
            {
                $reqCat = $this->bdd->prepare('INSERT INTO promotion(titre) VALUE (?)');
                $reqCat->execute(array($_POST['PromoAdd']));
            }
        }
    }

    public function SelectPromo()
    {
        return $this->bdd
            ->query('SELECT * FROM promotion')
            ->fetchAll();
    }

    public function EditPromo()
    {
        if (isset($_POST['titre']) && isset($_POST['editer']))
        {
            $edit = $this->bdd->prepare('UPDATE promotion SET titre = ? WHERE id = ?');
            $edit->execute(array($_POST['titre'], $_POST['editer']));
        }
    }

    public function DeletePromo()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM promotion WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }
}