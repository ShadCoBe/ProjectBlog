<?php

/**
 * undocumented class
 */
class Comment 
{

    // Headers dans la base
    private $_id;
    private $_author;
    private $_idarticle;
    private $_content;
    private $_validation;
    private $_date;
  


    public function __construct(array $data){
        $this->hydrate($data);
    }

    //Hydrate

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method ='set'.ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }  
    
    //setters

    public function setId($id)
    {
        $id = (int) $id;
        if($id > 0){
            $this->_id=$id;
        }
    }


    public function setIdarticle($idarticle)
    {
        $idarticle = (int) $idarticle;
        if($idarticle > 0){
            $this->_idarticle=$idarticle;
        }
    }

    public function setContent($content)
    {
        if(is_string($content)){
            $this->_content = $content;
        }
    }

    public function setAuthor($author)
    {
        if(is_string($author)){
            $this->_author = $author;
        }
    }


    public function setValidation($validation)
    {
        $validation = (int) $validation;
        if($validation > 0){
            $this->_validation=$validation;
        }
    }


    public function setDate($date)
    {
        $this->_date= $date;
    }


  
    //getters

    public function id()
    {
        return $this->_id;
    }

    public function idarticle()
    {
        return $this->_idarticle;
    }

    public function content()
    {
        return $this->_content;
    }

    public function author()
    {
        return $this->_author;
    }


    public function validation()
    {
        return $this->_validation;
    }

    
    public function date()
    {
        return $this->_date;
    }




    
}

?>