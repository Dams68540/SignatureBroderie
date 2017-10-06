<?php

namespace Mini\Model;

use Mini\Core\Model;

class deconnexion extends Model
{
    public function deconnecter()
    {
        if (isset($_POST['deco']) && isset($_SESSION['id']))
        {
            session_unset();
            session_destroy();
            header("Location:" . URL . "admin/connexion");
        }
    }

}
