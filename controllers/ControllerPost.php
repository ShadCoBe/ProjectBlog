<?php

require_once 'views/view.php';



class ControllerPost
{
    private $_articleManager;
    private $_view;
    private $_commentManager;

    


    public function __construct()
    {
        if(isset($url) && count($url) < 1){
            throw new \Exception("Page introuvable", 1);

        }
        elseif (isset($_GET['create'])) {
            $this->create();
          }

          elseif (isset($_GET['adcreate'])) {
            $this->adcreate();
          }

          elseif (isset($_GET['delete'])) {
            $this->delete();
          }

          
          elseif (isset($_GET['deletecom'])) {
            $this->deletecom();
          }




          elseif (isset($_GET['com'])) {
            $this->admincom();
          }


  
          elseif (isset($_GET['status']) && isset($_GET['status']) == "new") {
            $this->store();
          }


          elseif (isset($_GET['inscription'])) {
            $this->inscription();

          }

          elseif (isset($_GET['connexion'])) {
            $this->auth();

          }

          elseif (isset($_GET['admin'])) {
            $this->admin();

          }


          elseif (isset($_GET['validation'])) {
            $this->validate();

          }


          elseif (isset($_GET['send']) && isset($_GET['send']) == "new") {
            $this->newmember();

          }
         
         


        else{

            $this->article();

            
           
        }

        
    }

    private function article(){

        if (isset($_GET['id'])){
            $this->_articleManager = new ArticleManager;
            $article = $this-> _articleManager->getArticle($_GET["id"]);
            // Ajouter par Kéké//////////////////////////:::::::::::::::::
            $this-> _commentManager = new CommentManager;
            $comment = $this-> _commentManager->getComments($_GET["id"],"validation=1 and");
            $this->_view = new View('SinglePost');
            $this->_view->generate(array('article'=> $article,'comment'=> $comment));              
      
        }
        
    }


    // afficher formulaire de creation d'un article
    private function create(){

        if (isset($_GET['create'])){
            $this->_view = new View('CreatePost');
            $this->_view->generateForm();
        }
    }


    private function adcreate(){

      if (isset($_GET['adcreate'])){
        $this->_articleManager = new ArticleManager;
        $this->_articleManager->createArticle();
        header("location:".$_SERVER['HTTP_REFERER']);


      }
  }



      //fonction pour insérer un article
    //en bdd
    private function store()
    {
      $this->_articleManager = new ArticleManager;
      $article = $this->_articleManager->createArticle();
      $articles = $this->_articleManager->getArticles();
      header('location: accueil');
      $this->_view = new View('Accueil');
      $this->_view->generate(array('articles' => $articles));
    }


      //fonction pour supprimer un article
    //en bdd
    private function delete()
    {
      $this->_articleManager = new ArticleManager;
      $this->_articleManager->deleteArticle($_GET["delete"]);
      header("location:".$_SERVER['HTTP_REFERER']);
    }


    //fonction pour supprimer un commentaire vue admin
    //en bdd
    private function deletecom()
    {

      $this->_commentManager = new CommentManager;
      $this->_commentManager->deleteComment($_GET["deletecom"]);
      header("location:".$_SERVER['HTTP_REFERER']);
    }




      //fonction pour valider un commentaire
    //en bdd
    private function validate()
    {
      $this->_articleManager = new CommentManager;
      $this->_articleManager->validateComment($_GET["validation"]);
      header("location:".$_SERVER['HTTP_REFERER']);
    }



     //fonction pour insérer un nouvel utilisateur
    //en bdd
    private function newmember()
    {
      $this->_articleManager = new UserManager;
      $newuser = $this->_articleManager->createtUser();
      header('location: accueil');
      
    }




    // afficher formulaire d'inscription
    private function inscription()
    {

            $this->_view = new View('Inscription');
            $this->_view->generateInscription();
           
            
       
    }

  
    // afficher formulaire d'authentification
    private function auth(){
 
            $this->_view = new View('Authentication');
            $this->_view->generateAuthentication();

    }


    
    // afficher vue Admin
    private function admin(){

      $this->_articleManager = new ArticleManager;
      $articles = $this->_articleManager->getArticles();

      $this->_view = new View('Admin');
      $this->_view->generate(array('articles' => $articles));
}


    // afficher vue Admincom
    private function admincom(){

      $this->_articleManager = new CommentManager;
      $comment = $this->_articleManager->getComments($_GET["com"],"");

      $this->_view = new View('AdminCom');
      $this->_view->generate(array('comments'=> $comment));
}










}





?>