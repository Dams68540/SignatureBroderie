<?php

namespace Mini\Model;

use Mini\Core\Model;

class Actualites extends Model
{
    public function SelectActualites()
    {
        return $this->bdd
            ->query('SELECT id, titre, id_image, DATE_FORMAT(date, \'%d/%m/%Y %H:%i\') AS Date FROM actualite ORDER BY id DESC LIMIT 0, 1')
            ->fetchAll();
    }

    public function SelectActu($id_new = null)
    {
        if ($id_new == null)
        {
            return $this->bdd
                ->query('SELECT id, titre, id_image, DATE_FORMAT(date, \'%d/%m/%Y %H:%i\') AS Date FROM actualite ORDER BY id DESC LIMIT 0, 10')
                ->fetchAll();
        }
        else
        {
            return $this->bdd
                ->query("SELECT id, titre, id_image, DATE_FORMAT(date, '%d/%m/%Y %H:%i') AS Date FROM actualite WHERE id='$id_new'")
                ->fetch();
            exit();
        }
    }
}