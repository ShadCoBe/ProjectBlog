<?php

session_start();


    // Ajouté par kéké
   //Il s'agit d'un code provisoire a tester Ajax.
   //Il convient par la suite de connecter cette page avec le model du MVC inchaAllah
   // 

   if(isset($_SESSION['username']))
   { 

        
        $url = $_SERVER['HTTP_REFERER'];
        $param = explode("=", $url);


        $postid=$param[1];
        $comcontent =htmlspecialchars($_POST['comcontent']);
        $comauthor =$_SESSION['usersname'];

        //Obtenir l'url courante entière
        //echo $_SERVER['REQUEST_URI'];
       

       
                $bdd = new PDO('mysql:host=localhost; dbname=blog_kz; charset=utf8','root','');
                // constantes de PDO pour la gestion des erreurs
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
             
  

          $req = $bdd->prepare("INSERT INTO comments (id_article, author,content, date) 
                                      VALUES (?, ?, ?, ?)");
    
          $req->execute(array($postid, $comauthor,  $comcontent, date('Y-m-d H:i:s'))); 


         
      
          $req->closeCursor();


        
          echo '<p><b> Votre message a bien été envoyé pour validation. Merci </b> <span> &#128521 </span></p> ';
    
    }else{

          echo '<p><b> Vous n\'êtes pas connecté. Authentifier vous pour poster un commentaire </b>
          <a href="post&connexion">Je me connecte maintenant</a>  =>  </p> ';
    
    }


?>
