<?php

/**
 * undocumented class
 */
class Article 
{

    // Headers dans la base
    private $_id;
    private $_author;
    private $_title;
    private $_chapo;
    private $_content;
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


    public function setTitle($title)
    {
        if(is_string($title)){
            $this->_title = $title;
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

    public function setChapo($chapo)
    {
        if(is_string($chapo)){
            $this->_chapo = $chapo;
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

    public function title()
    {
        return $this->_title;
    }

    public function content()
    {
        return $this->_content;
    }

    public function author()
    {
        return $this->_author;
    }

    public function chapo()
    {
        return $this->_chapo;
    }

    public function date()
    {
        return $this->_date;
    }


    
}

?>