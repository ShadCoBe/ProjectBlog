
<!DOCTYPE html>
<html lang="en">


    
    <!--Ajouté par Kéké-->
    <head>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="accueil">Mon Blog PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post&create">Ajouter un poste</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html">Mon CV</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contactus">Contact</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post&connexion"><?php 
                           
                           
                           if (isset($_SESSION['usersname'])){
                            echo '<span> &#128151 </span>';
                            
                            echo $_SESSION['usersname'];

                            echo ' <i class="fas fa-sign-out-alt"></i>';


                           }else{
                            echo "Se connecter";
                            
                           }
                
                            ?></a></li>
          
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('public/assets/img/Future.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?=$article[0]->title()?></h1>
                            <h2 class="subheading"><?=$article[0]->chapo() ?></h2>
                            <span class="meta">
                                Posté par
                                <a href="#!"><?=$article[0]->author() ?></a>
                                en <?=$article[0]->date() ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?=$article[0]->content() ?></p>
                        <!-- <p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p>
                        <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p>
                        <p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That's how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p>
                        <p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p>
                        <h2 class="section-heading">The Final Frontier</h2>
                        <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
                        <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>
                        <blockquote class="blockquote">The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote>
                        <p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p>
                        <h2 class="section-heading">Reaching for the Stars</h2>
                        <p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p>
                        <a href="#!"><img class="img-fluid" src="public/assets/img/post-sample-image.jpg" alt="..." /></a>
                        <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>
                        <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>
                        <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p> -->
                       
   
                        <!-- Post Content-->
            <br>
                <div class="panel-body-com">
                <div class="row bootstrap snippets bootdeys">

                <form id="foo">
    
                  <textarea  id="cont" name="cont" class="form-control" placeholder="Ecrivez votre commentaire ici..." rows="1" onclick="this.rows ='3';"></textarea>
                <br>
                  <a type="Submit" action="post&com" class="float-center btn btn-outline-primary ml-2" onclick="postAjaxCom();"> <i class="fa fa-reply" ></i>Poster un nouveau commentaire</a>
                  <!--<button type="button" onclick="postStuff();">Submit Form</button > --> 
                    <div class="clearfix"></div>
                    <br> 
                </div>

                <!--Ajouté par kéké-->
                <span id="result" ></span>
                <br>
                <div id="status"></div>
     
                </form>                  
                </div>

                <br>
                        <!--To Work with icons-->  
                            <div class="container-com">

                            <?php 
                            foreach ($comment as $com):
                                ?>
                                <div class="card-com">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                                <p class="text-secondary text-center"> Il y'a 15 Minutes</p>
                                            </div>
                                            <div class="col-md-10">
                                                <p>
                                                    <a class="float-left" href="#!"><strong><?=$com->author() ?></strong></a>
                                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                                </p>
                                            <div class="clearfix"></div>
                                                <p><?=$com->content() ?></p>
                                                                             
                                                
                                                <p>
                                                
                                                    <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Repondre</a>
                                                    <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> J'aime</a>
                                            </p>
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>
                                <?php endforeach ?>  
                            </div>
                          

                        <!-- Post Content-->

                
                        <p>
                            Placeholder text by
                            <a href="http://spaceipsum.com/">Space Ipsum</a>
                            &middot; Images by
                            <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>


        <!-- ajouté par kéké -->
        <script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
        <script src="public/js/scripts.js"></script>
    </body>
</html>

        


