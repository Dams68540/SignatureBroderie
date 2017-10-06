<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 03/08/2017
 * Time: 17:30
 */

namespace Mini\Model;

use Mini\Core\Model;

class News extends Model
{
    public function AddNews()
    {

        if (isset($_POST['Ajouter']))
        {

            if (!empty($_POST['titreAdd']))
            {

                if ($_FILES['upload']['error'] == 0)
                {

                    if ($_FILES['upload']['size'] <= 1048576)
                    {

                        $extensions_valides = array('jpg', 'png'); // -- there we can add other extensions -- \\
                        $extension_upload = strtolower(substr(strrchr($_FILES['upload']['name'], '.'), 1));

                        if (in_array($extension_upload, $extensions_valides))
                        {

                            $id = $this->bdd->query("SELECT id FROM actualite ORDER BY id DESC");
                            $id = $id->fetch()->id + 1;

                            $extension = new \SplFileInfo($_FILES['upload']['name']);
                            $extension = $id . '.' . $extension->getExtension();
                            $nom = "../public/img/News/{$extension}";
                            $resultat = move_uploaded_file($_FILES['upload']['tmp_name'], $nom);

                            if ($resultat)
                            {

                                $reqCat = $this->bdd->prepare('INSERT INTO actualite(titre, date, id_image) VALUES (?, NOW(), ?)');
                                $reqCat->execute(array($_POST['titreAdd'], $extension));

                                if ($reqCat) {

                                    echo "Succès lors de l'ajout.";
                                } else {

                                    echo "Une erreur est survenue. Veuillez réessayer.";
                                }
                            } else
                                echo "Le transfert a échoué, veuillez réessayer.";
                        } else
                            echo "Seul les formats JPG et PNG sont acceptés.";
                    } else
                        echo "Le fichier choisi est trop volumineux, la taille maximum est de 1 Mo.";
                } else
                    echo "Une erreur est survenue lors de la reception de l'image, veuillez réessayer.";
            }
        }
    }

    public function SelectNews()
    {
        return $this->bdd
            ->query('SELECT id, titre, id_image, DATE_FORMAT(date, \'%d/%m/%Y %H:%i\') AS Date FROM actualite ORDER BY id DESC')
            ->fetchAll();
    }

    public function EditNews()
    {
        if (isset($_POST['titre']) && isset($_POST['editer']))
        {
            $edit = $this->bdd->prepare('UPDATE actualite SET titre = ? WHERE id = ?');
            $edit->execute(array($_POST['titre'], $_POST['editer']));
        }
    }

    public function DeleteNews()
    {
        if (isset($_POST['Supprimer']))
        {
            $delete = $this->bdd->prepare('DELETE FROM actualite WHERE id= ?');
            $delete->execute(array($_POST['Supprimer']));
        }
    }
}