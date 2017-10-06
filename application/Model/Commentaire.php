<?php

namespace Mini\Model;

use Mini\Core\Model;

class Commentaire extends Model
{
    public function AddCommentaire($info)
    {
        if (isset($_POST['ajouter']))
        {
            if (!empty($_POST['pseudo']) && !empty($_POST['comAdd']))
            {
                $reqCom = $this->bdd->prepare('INSERT INTO commentaires(id_news, pseudo, commentaire, date, grade) VALUES (?, ?, ?, NOW(), 0)');
                $reqCom->bindParam(1, $info);
                $reqCom->bindParam(2, $_POST['pseudo']);
                $reqCom->bindParam(3, $_POST['comAdd']);
                $reqCom->execute();
            }
        }
    }

    public function SelectCommentaire($news)
    {
        return $this->bdd
            ->query('SELECT id, id_news, pseudo, commentaire, DATE_FORMAT(date, \'%d/%m/%Y %H:%i\') AS Date, grade FROM commentaires  WHERE id_news = '.$news.' ORDER BY id DESC')
            ->fetchAll();
    }

    public function SelectCom()
    {
        return $this->bdd
            ->query('SELECT id, id_news, pseudo, commentaire, DATE_FORMAT(date, \'%d/%m/%Y %H:%i\') AS Date, grade FROM commentaires WHERE grade = 0 ORDER BY id DESC')
            ->fetchAll();
    }

    public function rowCount()
    {
        $row = $this->bdd->query('SELECT * FROM commentaires WHERE grade = 0 ORDER BY id DESC');
        return $row->rowCount();
    }

    public function AcceptCom()
    {
        if (isset($_POST['accept']))
        {
            $upCom = $this->bdd->prepare('UPDATE commentaires SET grade = 1 WHERE id = ?');
            $upCom->execute(array($_POST['accept']));

            header('refresh:0');
        }
    }

    public function deleteCom()
    {
        if (isset($_POST['supprimer']))
        {
            $supCom = $this->bdd->prepare('DELETE FROM commentaires WHERE id = ?');
            $supCom->execute(array($_POST['supprimer']));

            header('refresh:0');
        }
    }
}