<?php


namespace Mini\Controller;

use Mini\Model\Description;
use \Mini\Model\Twig;

class FormController
{
    public function __construct()
    {
        $this->description = new Description();
    }

    public function index()
    {
        Twig::twig()->display('form/index.twig', array(
            'URL' => URL,
            'ROOT' => ROOT,
            'description' => $this->description->SelectDescription()));
    }

}