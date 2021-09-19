  
<?php

/**
 *
 */
class View
{
  //fichier vue
  private $_file;

  //titre de la page
  private $_t;

  function __construct($action)
  {
    $this->_file = 'views/view'.$action.'.php';
  }



  //crée une fonction qui va
  //générer et afficher la vue de tous les articles
  public function generate($data){
    //définir le contenu à envoyer
    $content = $this->generateFile($this->_file, $data);
 
  
    //template
    $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }

  //générer la vue d'un article
  public function generatePost($data,$data_com){
    //définir le contenu à envoyer
    
    $content = $this->generateFile($this->_file, $data);

    

    //template
    $view = $this->generateFile('views/templateSingle.php', array('t' => $this->_t, 'content' => $content,'comment' => $data_com));
    echo $view;
  }


  //générer la vue utilisateur
  public function generateAdminUsers($data){
    //définir le contenu à envoyer
    
    $content = $this->generateFile($this->_file, $data);

    

    //template
    $view = $this->generateFile('views/templateAdminUser.php', array('t' => $this->_t, 'content' => $content,'comment' => $data_com));
    echo $view;
  }


  //générer la vue contact
  public function generateContact(){

      //définir le contenu à envoyer
      $content = $this->generateFileSimple($this->_file);

      //template
      $view = $this->generateFile('views/templateContact.php', array('t' => $this->_t, 'content' => $content));
      echo $view;
    }
  
  





  //générer la vue du formulaire
  //de création d'un article
  public function generateForm(){
    //définir le contenu à envoyer
    $content = $this->generateFileSimple($this->_file);

    //template
    $view = $this->generateFile('views/templateForm.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }


   //générer la vue admin
  public function generateAdmin($data){
    //définir le contenu à envoyer
    $content = $this->generateFile($this->_file,$data);

    //template
    $view = $this->generateFile('views/templateAdmin.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }
  

  public function generateinscription(){
    //définir le contenu à envoyer
    $content = $this->generateFileSimple($this->_file);

    //template
    $view = $this->generateFile('views/templateUserNew.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }

  public function generateAuthentication(){
    //définir le contenu à envoyer
    $content = $this->generateFileSimple($this->_file);

    //template
    $view = $this->generateFile('views/templateAuthentication.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }



  private function generateFile($file, $data){
    $file;
    if (file_exists($file)) {
      extract($data);

      //commencer la temporisation
      ob_start();

      require $file;

      //arreter la temporisation
     return ob_get_clean();
    }
    else {
      throw new \Exception("Fichier ".$file." introuvable", 1);

    }
  }

  private function generateFileSimple($file){
    if (file_exists($file)) {



      require $file;

    }
    else {
      throw new \Exception("Fichier ".$file." introuvable", 1);

    }
  }












}









 ?>