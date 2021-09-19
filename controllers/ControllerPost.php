<?php




require_once 'views/view.php';




class ControllerPost
{
    private $_articleManager;
    private $_view;
    private $_commentManager;
    private $_userManager;
    


    public function __construct()
    {
        if(isset($url) && count($url) < 1){
            throw new \Exception("Page introuvable", 1);

        }
        // elseif (isset($_GET['create'])) {
        //     $this->create();
        //   }

          elseif (isset($_GET['adcreate'])) {
            $this->adcreate();
          }

          elseif (isset($_GET['delete'])) {
            $this->delete();
          }


          elseif (isset($_GET['riduser'])) {
            $this->deleteuser();
          }


           
          elseif (isset($_GET['deletecom'])) {
            $this->deletecom();
          }


          elseif (isset($_GET['update'])) {
            
        
            $this->saveEditedArticle();
          }

          
          elseif (isset($_GET['message'])) {
            
        
            $this->contactMessage();
          }



          
          elseif (isset($_GET['updateuser'])) {
        
            $this->saveEditedUser();
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

          elseif (isset($_GET['contact'])) {
  
            $this->contact();

          }

          elseif (isset($_GET['connexion'])) {
            $this->auth();

          }

          elseif (isset($_GET['user'])) {
            $this->register();

          }

          elseif (isset($_GET['permission'])) {
            $this->adminuser();

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

           $_SESSION['connexion'] = "Se connecter";

            $this->_articleManager = new ArticleManager;
            $article = $this-> _articleManager->getArticle($_GET["id"]);
            // Ajouter par Kéké//////////////////////////:::::::::::::::::
            $this-> _commentManager = new CommentManager;
            $comment = $this-> _commentManager->getComments($_GET["id"],"validation=1 and");
            $this->_view = new View('SinglePost');
            $this->_view->generate(array('article'=> $article,'comment'=> $comment));              
      
        }
        
    }


    // // afficher formulaire de creation d'un article
    // private function create(){

    //     if (isset($_GET['create'])){
    //         $this->_view = new View('CreatePost');
    //         $this->_view->generateForm();
    //     }
    // }


    private function adcreate(){

      if (isset($_GET['adcreate'])){
        
        $this->_articleManager = new ArticleManager;
        $this->_articleManager->createArticle();
        header("location:".$_SERVER['HTTP_REFERER']);


      }
  }


  
  private function deleteuser(){

      $this->_userManager = new UserManager;
      $this->_userManager->deleteUser($_GET['riduser']);
      header("location:".$_SERVER['HTTP_REFERER']);

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


          // sauvegarder article modifié
          private function saveEditedArticle(){

            if (isset($_GET['update'])){

              if(strcmp($_SESSION['usersname'], $_POST['name-user'])==0 |$_SESSION['permission']==1){
  
                $this->_articleManager = new ArticleManager;
                $this->_articleManager->editArticle($_POST['id']);
              

              } 

              header("location:".$_SERVER['HTTP_REFERER']);
          
            }
        }


        // sauvegarder utilisateur 'permission' modifiée
        private function saveEditedUser(){

          if (isset($_GET['updateuser'])){
            $this->_userManager = new UserManager;
            $this->_userManager->editUser($_POST['id']);
            header("location:".$_SERVER['HTTP_REFERER']);
            
          }
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
      $this->_commentManager  = new CommentManager;
      $this->_commentManager->validateComment($_GET["validation"]);
      header("location:".$_SERVER['HTTP_REFERER']);
    }



     //fonction pour insérer checker dans la bdd et créer un nouvel utilisateur
    //en bdd
    private function newmember()
    {

      session_unset();
      
      
      $this->_userManager = new UserManager;

      $chekedUser = $this->_userManager->CheckUserRegistration();

      if(empty($chekedUser) ) {


      $this->$_userManager = new UserManager;
      $newuser = $this->$_userManager->createtUser();

      session_start();

      header('location: accueil');



    }else{
      session_unset();
      echo '<script> alert("Ce mail exist déja! Merci d\'en choisir un autre !");</script>';
      


    }
      
    }


    // afficher formulaire d'inscription
    private function inscription()
    {
            $this->_view = new View('Inscription');
            $this->_view->generateInscription();
          
       
    }


    // S'auto-envoyer le message de contact
    private function contactMessage()
    {

      $objectemail= $_POST['object'].' **** '.$_POST['email'].' **** '.$_POST['name'];

            if(mail('ingridleboncoin78@gmail.com', $objectemail, $_POST['message'],'From: ingridleboncoin78@gmail.com')){

                echo '<script> alert("Votre message à bien été envoyé aux administrateurs!");</script>';
            }else{

                echo '<script> alert("Une erreur s\'est produite et votre message n\'a pas été envoyé aux administrateurs!");</script>';
            
            }



    }


     // afficher formulaire de contact
     private function contact()
     {

 
             $this->_view = new View('Contact');
             $this->_view->generateContact();
           
        
     }


     //connexion user
    private function register()
    
    {
      

      $this->_userManager = new UserManager;
      $currentUser = $this->_userManager->registerUser();

        if(isset($currentUser[0])){
          $_SESSION['id']= $currentUser[0]->id();
          $_SESSION['username']= $currentUser[0]->username();
          $_SESSION['usersname']= $currentUser[0]->usersname();
          $_SESSION['email']= $currentUser[0]->email();
          $_SESSION['userpassword']= $currentUser[0]->userpassword();
          $_SESSION['permission']=$currentUser[0]->permission();
          $hash=$_SESSION['userpassword'];


          if (password_verify($_POST['pw'],$hash)) {

            header("location: accueil");

        } else {

            session_unset();
            echo '<script> alert("Votre compte n\'a pas été reconnu.Merci de vérifier votre email ou votre mot de passe");</script>';
        }




    

          
      
              
        

      }


    }



  
    // afficher formulaire d'authentification
    private function auth(){
 
            $this->_view = new View('Authentication');
            $this->_view->generateAuthentication();

    }


    
    // afficher vue Admin
    private function admin(){



  
      if($_SESSION['permission']<1){

        header('location: post&connexion');
     
      }else{
        
        $this->_articleManager = new ArticleManager;
        $articles = $this->_articleManager->getArticles();
        $this->_view = new View('Admin');
        $this->_view->generate(array('articles' => $articles));

    }
}


    // afficher vue Admincom
    private function admincom(){

      $this->_articleManager = new CommentManager;
      $comment = $this->_articleManager->getComments($_GET["com"],"");

      $this->_view = new View('AdminCom');
      $this->_view->generate(array('comments'=> $comment));

}


    // afficher vue Adminuser
    private function adminuser(){

      if($_SESSION['permission']==1){

      $this->_userManager = new UserManager;
      $user = $this->_userManager->getUsers();

      $this->_view = new View('AdminUser');
      $this->_view->generate(array('users'=> $user));

    }else{

      header('location: post&admin');


    }

  }




}





?>