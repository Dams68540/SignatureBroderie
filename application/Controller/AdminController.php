<?php

namespace Mini\Controller;

use Mini\Model\Actualites;
use Mini\Model\Articles;
use Mini\Model\Categorie;
use Mini\Model\Commentaire;
use Mini\Model\connexion;
use Mini\Model\deconnexion;
use Mini\Model\Description;
use Mini\Model\News;
use Mini\Model\Promotion;
use \Mini\Model\Twig;

class AdminController
{
    public function __construct()
    {
        $this->description = new Description();
        $this->actualite = new Actualites();
        $this->articles = new Articles();
        $this->categorie = new Categorie();
        $this->news = new News();
        $this->promotion = new Promotion();
        $this->connexion = new connexion();
        $this->deconnexion = new deconnexion();
        $this->commentaire = new Commentaire();
    }


    public function index()
    {

        if (isset($_SESSION['id']))
        {
            Twig::twig()->display('admin/index.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'description' => $this->description->SelectDescription(),
                'categorie' => $this->categorie->SelectCategories(),
                'AddCategorie' => $this->categorie->AddCategories(),
                'deconnexion' => $this->deconnexion->deconnecter(),
                'user' => $this->connexion->selectUser(),
                'row' => $this->commentaire->rowCount()
            ));
        }
        else
        {
            header('Location:'.URL.'admin/connexion');
        }
    }

    public function connexion()
    {
        Twig::twig()->display('admin/connexion.twig', array(
            'URL' => URL,
            'ROOT' => ROOT,
            'co' => $this->connexion->connexion(),
        ));
    }

    public function description()
    {
        if (isset($_SESSION['id'])) {
            Twig::twig()->display('admin/description.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'description' => $this->description->AddDescription(),
                'editDescription' => $this->description->EditDescription(),
                'deleteDescription' => $this->description->DeleteDescription(),
                'descriptions' => $this->description->SelectDescription(),
                'deconnexion' => $this->deconnexion->deconnecter(),
                'user' => $this->connexion->selectUser(),
                'row' => $this->commentaire->rowCount()
            ));
        }
        else
        {
            header('Location:'. URL . 'admin/connexion');
        }
    }

    public function categorie()
    {
        if (isset($_SESSION['id'])) {
            Twig::twig()->display('admin/categorie.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'categorie' => $this->categorie->AddCategories(),
                'editCategorie' => $this->categorie->EditCategories(),
                'deleteCategorie' => $this->categorie->DeleteCategories(),
                'categories' => $this->categorie->SelectCategories(),
                'deconnexion' => $this->deconnexion->deconnecter(),
                'user' => $this->connexion->selectUser()
            ));
        }
        else
        {
            header('Location:'. URL . 'admin/connexion');
        }
    }

    public function articles()
    {
        if (isset($_SESSION['id'])) {
            Twig::twig()->display('admin/articles.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'article' => $this->articles->AddArticles(),
                'editArticle' => $this->articles->EditArticle(),
                'deleteArticle' => $this->articles->DeleteArticle(),
                'articles' => $this->articles->Articles(),
                'categorie' => $this->categorie->SelectCategories(),
                'selectArticle' => $this->articles->SelectArticle(),
                'envoyer' => $this->articles->SelectArticle(),
                'deconnexion' => $this->deconnexion->deconnecter(),
                'user' => $this->connexion->selectUser(),
                'row' => $this->commentaire->rowCount()
            ));
        }
        else
        {
            header('Location:'. URL . 'admin/connexion');
        }
    }

    public function news()
    {
        if (isset($_SESSION['id'])) {
            Twig::twig()->display('admin/news.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'addNews' => $this->news->AddNews(),
                'editNews' => $this->news->EditNews(),
                'deleteNews' => $this->news->DeleteNews(),
                'news' => $this->news->SelectNews(),
                'deconnexion' => $this->deconnexion->deconnecter(),
                'user' => $this->connexion->selectUser(),
                'row' => $this->commentaire->rowCount()
            ));
        }
        else
        {
            header('Location:'. URL . 'admin/connexion');
        }
    }

    public function promo()
    {
        if (isset($_SESSION['id'])) {
            Twig::twig()->display('admin/promo.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'addPromo' => $this->promotion->AddPromo(),
                'editPromo' => $this->promotion->EditPromo(),
                'deletePromo' => $this->promotion->DeletePromo(),
                'promotion' => $this->promotion->SelectPromo(),
                'deconnexion' => $this->deconnexion->deconnecter(),
                'user' => $this->connexion->selectUser(),
                'row' => $this->commentaire->rowCount()
            ));
        }
        else
        {
            header('Location:'. URL . 'admin/connexion');
        }
    }

    public function commentaire()
    {
        if (isset($_SESSION['id']))
        {
            Twig::twig()->display('admin/commentaire.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'deconnexion' => $this->deconnexion->deconnecter(),
                'user' => $this->connexion->selectUser(),
                'commentaires' => $this->commentaire->SelectCom(),
                'accept' => $this->commentaire->AcceptCom(),
                'supprimer' => $this->commentaire->deleteCom(),
                'row' => $this->commentaire->rowCount()
            ));
        }
        else
        {
            header('Location:'. URL . 'admin/connexion');
        }
    }
}