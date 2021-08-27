  <?php
  
  class ArticleManager extends Model 
  {

    //Fonction de récupération de tous les articles dans base

    public function getArticles(){
      // Essayer avec self:: pour voir :)
        return $this->getAll('articles', 'Article');

    }      

    public function getArticle($id){
      return $this->getOne('articles', 'Article', $id);
    }
    
    public function createArticle(){
      return $this->createOne('articles', 'Article');
    }

  }
  
  
  
  
  
  ?>