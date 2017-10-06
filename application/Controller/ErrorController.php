<?php

namespace Mini\Controller;

use Mini\Model\Twig;

class ErrorController
{
    public function index()
    {
       Twig::twig()->display('error/index.twig', array(
        'URL' => URL,
        'ROOT' => ROOT));
    }
}
