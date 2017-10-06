<?php

namespace Mini\Model;

class Twig{

    static function twig()
    {
        global $environment;
        return $environment;
    }
}