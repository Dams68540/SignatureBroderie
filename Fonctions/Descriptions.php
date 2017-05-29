<?php

require_once 'BDD.php';

class Description extends \BDD
{
    public function AddDescription()
    {
        if (isset($_POST['ajouter'])) {
            if (!empty($_POST['titreAdd']) && !empty($_POST['texteAdd'])) {
                $reqdes = $this->bdd->prepare('INSERT INTO Presentation(titre, texte) VALUES(?, ?)');
                $reqdes->execute(array($_POST['titreAdd'], $_POST['texteAdd']));
            }
        }
    }

    public function SelectDescription()
    {
        return $this->bdd
            ->query('SELECT id, Titre, Texte FROM Presentation')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public function EditDescription()
    {
        if (isset($_POST['titre']) && isset($_POST['texte']))
        {
            if (isset($_POST['editer']))
            {
                $edit = $this->bdd->prepare('UPDATE Presentation SET titre = ?, texte = ? WHERE id = ?');
                $edit->execute(array($_POST['titre'], $_POST['texte'], $_POST['editer']));
            }
        }
    }

    public function DeleteDescription()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM Presentation WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }
}
