<?php



require_once 'views/view.php';




class ControllerUser
{
    private $_loginManager;
 

    


    public function __construct()
    {
        if(isset($url) && count($url) < 1){
            throw new \Exception("Page introuvable", 1);

        }
        elseif (isset($_GET['sendemail'])) {
           

          }



         

        
    }






}





?>