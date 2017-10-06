<?php

namespace Mini\Model;

use Mini\Core\Model;

class Description extends Model
{
    public function AddDescription()
    {
        if (isset($_POST['Ajouter'])) {
            if (!empty($_POST['titreAdd']) && !empty($_POST['texteAdd'])) {
                $reqdes = $this->bdd->prepare('INSERT INTO presentation(titre, texte) VALUES(?, ?)');
                $reqdes->execute(array($_POST['titreAdd'], $_POST['texteAdd']));
            }
        }
    }

    public function SelectDescription()
    {
        return $this->bdd
            ->query('SELECT id, Titre, Texte FROM presentation ORDER BY id DESC')
            ->fetchAll();
    }

    public function EditDescription()
    {
        if (isset($_POST['titre']) && isset($_POST['texte']))
        {
            if (isset($_POST['editer']))
            {
                $edit = $this->bdd->prepare('UPDATE presentation SET titre = ?, texte = ? WHERE id = ?');
                $edit->execute(array($_POST['titre'], $_POST['texte'], $_POST['editer']));
            }
        }
    }

    public function DeleteDescription()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM presentation WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }

}