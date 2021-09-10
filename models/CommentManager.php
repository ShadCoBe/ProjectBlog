<?php
  
  class CommentManager extends Model 
  {

    public function getComments($id, $argadm){

      return $this->getAllComments('comments', 'Comment',$id, $argadm);

    }    
    

     
    public function createComment($id){

      return $this->createOneComment('comments', 'Comment', $id);
    }



    public function validateComment($id){

      return $this->validateOneComment('comments', 'Comment', $id);
    }

    public function deleteComment($id){
      return $this->DeleteOne('comments', 'Comment', $id);
    }

  


  }

  
  
  ?>