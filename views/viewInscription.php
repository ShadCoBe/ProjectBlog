      <!-- Page Header-->
      <header class="masthead" style="background-image: url('public/assets/img/inscription.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Inscription</h1>
                            <span class="subheading">Vous êtes nouveau? Inscrivez-vous sans plus tarder!</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
                  


       <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Nos articles n'attendent plus que vous :)</p>





<div class="my-5">
                            
                            <form method="post" action="post&send=new"  id="contactForm">
                                

                                <div class="form-floating">
                                    <input class="form-control" name="name" type="text" placeholder="Enter votre nom..." required/>
                                    <label for="name">Votre nom</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est requis.</div>
                                </div>

                                <div class="form-floating">
                                    <input class="form-control" name="usersname" type="text" placeholder="Enter votre nom..." required />
                                    <label for="username">Votre nom utilisateur</label>
                                    <div class="invalid-feedback" data-sb-feedback="username:required">Un nom utilisateur est requis.</div>
                                </div>
                             
                                <div class="form-floating">
                                    <input class="form-control" name="email" type="email" placeholder="Entrer votre email..." required/>
                                    <label for="email">Votre adresse email</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">l'email est requis.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email non valide.</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="pw" name="pw" type="password" onkeyup="check()" placeholder="Entrer votre mot de passe..." data-sb-validations required />
                                    <label for="password">Votre mot de passe</label>
                                    <div class="invalid-feedback" data-sb-feedback="password:required">Le mot de passe est requis.</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="pwcon" name="pwcon" type="password" onkeyup="check()"; placeholder="Entrer votre mot de passe..." data-sb-validations required />
                                    <label for="confpassword">Confirmer votre mot de passe</label>
                                    <div class="invalid-feedback" data-sb-feedback="confpassword:required">La confirmation de votre mot de passe est requise.</div>
                                </div>
                                <p id="message"></p>


                                <br/>

                                <div>
                                  <input type="checkbox" id="scales" name="scales"  required>
                                  <label for="scales"><small>En cochant cette case je confirme avoir pris connaissance des <a href="post&connexion"><b> CGU </b></a></small></label>
                                </div>

        
                       
                                <br />
                                <br />



                                
                                
                            
                                <button id="submitButton" class="btn btn-primary btn-lg" type="submit">S'inscrire</button>
                                <!--<script src = 'https: //www.google.com/recaptcha/api.js' async defer>
                                <div class = "g-recaptcha" data-sitekey = "6LftWWAcAAAAAJaoU9yhkzz66wcadm5kZdJxgIay">
                                    secret key 6LftWWAcAAAAACmfgxDZbYo_F8j-Hvwb4qMcii6i-->


                            </form>

                           
                           
   
                          
                            
                            <div class="subscrib">

                      

                             <P> Déja inscrit ?<span>&#8594;</span><a href="post&connexion"><b>  Je me connecte </b></a></p>  
                             
                             
                             


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="public/js/scripts.js"></script>
