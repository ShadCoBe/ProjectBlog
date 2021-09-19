<?php

/**
 * undocumented class
 */
class User
{

    // Headers dans la base
    private $_id;
    private $_username;
    private $_usersname;
    private $_email;
    private $_userpassword;
    private $_permission;
    private $_date_inscription;



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

    public function setPermission($permission)
    {
        $permission = (int) $permission;
        if($permission > 0){
            $this->_permission=$permission;
        }
    }



    public function setUsername($username)
    {
        if(is_string($username)){
            $this->_username = $username;
        }
    }

    public function setUsersname($usersname)
    {
        if(is_string($usersname)){
            $this->_usersname = $usersname;
        }
    }

    public function setEmail($email)
    {
        if(is_string($email)){
            $this->_email = $email;
        }
    }

    public function setUserpassword($userpassword)
    {
        if(is_string($userpassword)){
            $this->_userpassword = $userpassword;
        }
    }

    public function setDate_inscription($date_inscription)
    {
        $this->_date_inscription= $date_inscription;
    }

  
  
    //getters

    public function id()
    {
        return $this->_id;
    }

    public function permission()
    {
        return $this->_permission;
    }


    public function username()
    {
        return $this->_username;
    }

    public function usersname()
    {
        return $this->_usersname;
    }

    public function email()
    {
        return $this->_email;
    }

    public function userpassword()
    {
        return $this->_userpassword;
    }

    public function date_inscription()
    {
        return $this->_date_inscription;
    }


   

    
}

?>