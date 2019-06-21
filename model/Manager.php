<?php
namespace Julie\Blog\Model;

class Manager{
    private static function setBdd()
    {   
        //INSTANCIE LA CONNEXION
        self::$_bdd = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
        //RECUPERE LA CONNEXION A LA BDD
    protected function getDbConnect()
    {
        if(self::$_bdd == null)
        self::setDb();
        return self::$_bdd;
    }
}