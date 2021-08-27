


       <!-- Page Header-->
       <header class="masthead" style="background-image: url('public/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>PHP MVC</h1>
                            <span class="subheading">BENSALEM KNOUZ</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                <?php

                 foreach ($articles as $article):
                ?>

                    <!-- Post preview-->
                    <div class="post-preview">
                        <!--<a href="post.html">-->
                            <a href="post&id=<?= $article->id() ?>">
                            <h2 class="post-title"> <?=$article->title() ?></h2>
                            <h3 class="post-subtitle"><?=$article->chapo() ?></h3>
                        </a>
                        <p class="post-meta">
                            Posté par 
                            <a href="#!"><?=$article->author() ?></a>
                            en <?=$article->date() ?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />

                    <?php endforeach ?>

                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Postes anciens →</a></div>
                </div>
            </div>
        </div>
      

