<?php

require_once 'BDD.php';

class Actualites extends \BDD
{
    public function AddActualite()
    {
        if (isset($_POST['Ajouter'])) {
            if (!empty($_POST['TitreAdd'])) {
                $reqCat = $this->bdd->prepare('INSERT INTO Actualite(Titre, Date) VALUE (?, NOW())');
                $reqCat->execute(array($_POST['TitreAdd']));
            }
        }
    }

    public function SelectActualite()
    {
        return $this->bdd
            ->query('SELECT id, Titre, DATE_FORMAT(date, \'%d/%m/%Y %H:%i\') AS Date FROM Actualite')
            ->fetchAll();
    }

    public function EditActualite()
    {
        if (isset($_POST['titre']) && isset($_POST['editer']))
        {
            $edit = $this->bdd->prepare('UPDATE Actualite SET Titre = ? WHERE id = ?');
            $edit->execute(array($_POST['titre'], $_POST['editer']));
        }
    }

    public function DeleteActualite()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM Actualite WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }
}