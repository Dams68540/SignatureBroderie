<?php

namespace Mini\Model;

use Mini\Core\Model;

class connexion extends Model
{
    public function connexion()
    {
        if (isset($_POST['connexion'])) {
            $pseudo = $_POST['pseudo'];
            $mdp = sha1($_POST['mdp']);

            if (!empty($pseudo) AND !empty($mdp)) {
                $userreq = $this->bdd->prepare('SELECT * FROM connexionAdmin WHERE pseudo = ? AND motdepasse = ?');
                $userreq->execute(array($pseudo, $mdp));
                $userexist = $userreq->rowCount();
                if ($userexist == 1) {
                    $userinfo = $userreq->fetch();
                    $_SESSION['id'] = $userinfo->id;
                    $_SESSION['pseudo'] = $userinfo->pseudo;
                    $_SESSION['mdp'] = $userinfo->motdepasse;
                    header('location:' . URL . 'admin');
                } else {
                    echo "<script> alert('Votre pseudo ou votre mot de passe est incorrect ! Veuillez recommencer...')</script>";
                }

            } else {
                echo '<script> alert("Tous les champs doivent être complétés")</script>';
            }
        }
    }

    public function selectUser()
    {
        if (isset($_SESSION['id']))
        {
            return $this->bdd
                ->query('SELECT id, pseudo, motdepasse FROM connexionAdmin WHERE id ='.$_SESSION['id'])
                ->fetch();
        }
    }
}