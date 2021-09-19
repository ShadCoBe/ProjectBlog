<?php



  
  class UserManager extends Model 
  {

    //

    public function getUsers(){

      return $this->getAllUsers('users', 'user');

    }    

    public function createtUser(){

        return $this->createNewUser('users', 'user');

    }   
    
    
    public function registerUser()
    {

      return $this->register('users', 'user');

    }



    public function CheckUserRegistration()
    {

      return $this->checkUserEmail('users', 'email');

    }


    public function deleteUser($id){
      return $this->DeleteOne('users', 'user', $id);
    }


    public function editUser($id){
      return $this->editOneUser('users','user', $id);
    }










   
   

  
  
  
   }
  ?>