<?php

abstract class Model
{
    private static $_bdd;


    // Connexion à la base
    private static function setBdd(){
        self:: $_bdd = new PDO('mysql:host=localhost; dbname=blog_kz; charset=utf8','root','');

        // constantes de PDO pour la gestion des erreurs
        self:: $_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }

    //Fonction de connexion 
    protected function getBdd(){
        if (self:: $_bdd == null){
            self :: setBdd();
            return self:: $_bdd;
        }
    }


    //Methode de récupération de list d'élèments

    protected function getAll($table, $obj){
        $this -> getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT *, DATE_FORMAT(date, '%M %d, %Y à %Hh%i') AS date FROM ".$table." ORDER BY id desc");
        $req->execute();

        //variable data pour les données
        while ($data = $req->fetch(PDO::FETCH_ASSOC)){
            //Transformer les données sous forme d'objets
            $var[] = new $obj($data);
        }

        return $var;
        $req->closeCursor();


        }

        protected function getOne($table, $obj, $id)
        {
          $this->getBdd();
          $var = [];
          $req = self::$_bdd->prepare("SELECT id, title, content, author, chapo, DATE_FORMAT(date, '%M %d, %Y à %Hh%i') AS date FROM " .$table. " WHERE id = ?");
          $req->execute(array($id));
          while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
          }
      
          return $var;
          $req->closeCursor();
        }


        protected function createOne($table, $obj)
        {
          $this->getBdd();
          $req = self::$_bdd->prepare("INSERT INTO ".$table." (title, content,chapo,author, date) VALUES (?, ?, ?, ?, ?)");
          $req->execute(array($_POST['title'], $_POST['content'],$_POST['sub-title'],'Knouz', date('Y-m-d H:i:s')));
    
      
          $req->closeCursor();
        }
      



}




?>

