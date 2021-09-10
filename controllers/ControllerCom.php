<?php

    // Ajouté par kéké
   //Il s'agit d'un code provisoire a tester Ajax.
   //Il convient par la suite de connecter cette page avec le model du MVC inchaAllah
   // 



        
        $url = $_SERVER['HTTP_REFERER'];
        $param = explode("=", $url);


        $postid=$param[1];
        $comcontent =$_POST['comcontent'];
        $comauthor ='knouz';

        //Obtenir l'url courante entière
        //echo $_SERVER['REQUEST_URI'];
        
        //Obtenir l'url précédente entière
        //echo $_SERVER['HTTP_REFERER'];

        //echo $postid;
        //echo $comcontent;
        //echo $comauthor;



       
                $bdd = new PDO('mysql:host=localhost; dbname=blog_kz; charset=utf8','root','');
                // constantes de PDO pour la gestion des erreurs
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
             
  

          $req = $bdd->prepare("INSERT INTO comments (id_article, author,content, date) 
                                      VALUES (?, ?, ?, ?)");
    
          $req->execute(array($postid, $comauthor,  $comcontent, date('Y-m-d H:i:s'))); 


         
      
          $req->closeCursor();


        
          echo '<p><b> Knouz, votre message a bien été envoyé pour validation. Merci </b> <span> &#128521 </span></p> ';
    


?>
