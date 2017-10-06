<?php

namespace Mini\Controller;

use Mini\Model\Actualites;
use Mini\Model\Articles;
use Mini\Model\Categorie;
use Mini\Model\Commentaire;
use Mini\Model\Description;
use \Mini\Model\Twig;

class ArticlesController
{
    public function __construct()
    {
        $this->description = new Description();
        $this->actualite = new Actualites();
        $this->articles = new Articles();
        $this->categorie = new Categorie();
        $this->commentaire = new Commentaire();
    }

    public function index()
    {
        Twig::twig()->display('articles/index.twig', array(
            'URL' => URL,
            'ROOT' => ROOT,
            'description' => $this->description->SelectDescription(),
            'categorie' => $this->categorie->SelectCategories(),
            'articles' => $this->articles,
            'i' => 1
            ));
    }

    public function newsInfo($info)
    {
        if(isset($info) && is_numeric($info))
        {
            Twig::twig()->display('articles/newsInfo.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'description' => $this->description->SelectDescription(),
                'actualite' => $this->actualite->SelectActu($info),
                'commentaire' => $this->commentaire->AddCommentaire($info),
                'selectCom' => $this->commentaire->SelectCommentaire($info)
            ));
        }
        else
        {
            header('location:' . URL . 'error');
        }
    }

    public function articleInfo($article)
    {
        if(isset($article) && is_numeric($article))
        {
            Twig::twig()->display('articles/articleInfo.twig', array(
                'URL' => URL,
                'ROOT' => ROOT,
                'description' => $this->description->SelectDescription(),
                'article' => $this->articles->SelectArt($article),
            ));
        }
        else
        {
            header('location:' . URL . 'articles');
        }
    }
}