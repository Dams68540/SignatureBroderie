<?php

class BDD
{
    private $debug = true;

    /***
     * @proprety $bdd
     */

    protected $bdd;

    public function __construct()
    {
        self::openDbConnection();
    }

    private function openDbConnection()
    {
        try {
            $this->bdd = new PDO('mysql:host=127.0.0.1;dbname=SignatureBroderie;charset=UTF8', 'root', 'toor');
            $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (Exception $exception) {
            if ($this->debug) {
                echo $exception->getMessage();
            } else {
                echo 'Une erreur est survenue lors de la connection à la base de données.';
            }
        }
    }
}