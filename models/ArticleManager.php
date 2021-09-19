  <?php
  
  class ArticleManager extends Model 
  {

    //Fonction de récupération de tous les articles dans base

    public function getArticles(){
      
        return $this->getAll('articles', 'Article');

    }      

    public function getArticle($id){
      return $this->getOne('articles', 'Article', $id);
    }
    
    public function createArticle(){
      return $this->createOne('articles', 'Article');
    }

    public function deleteArticle($id){
      return $this->DeleteOne('articles', 'Article', $id);
    }


    public function editArticle($id){
      return $this->editOne('articles','Article', $id);
    }

  }
    
  
  ?>