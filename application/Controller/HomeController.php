<?php

namespace Mini\Controller;

use Mini\Model\Actualites;
use Mini\Model\Description;
use Mini\Model\Promotion;
use \Mini\Model\Twig;


class HomeController
{
    public function __construct()
    {
        $this->description = new Description();
        $this->actualites = new Actualites();
        $this->promotion = new Promotion();
    }

    public function index()
    {
        Twig::twig()->display('home/index.twig', array(
            'URL' => URL,
            'ROOT' => ROOT,
            'description' => $this->description->SelectDescription(),
            'actualites' => $this->actualites->SelectActu(),
            'promotion' => $this->promotion->SelectPromo()));
    }

    public function news() {

        Twig::twig()->display('home/news.twig', array(
            'URL' => URL,
            'ROOT' => ROOT,
            'description' => $this->description->SelectDescription(),
            'actualites' => $this->actualites->SelectActu()));
    }
}
