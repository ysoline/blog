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

        //RECUPERE TOUTES LES DONNES DU TABLE
    protected function getAll($table, $obj)
    {
        $var =[];
        $req = self::$_bdd->prepare('SELECT * FROM ' .$table.' ORDER BY id desc');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[]=new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}