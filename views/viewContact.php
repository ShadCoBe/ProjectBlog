



<!-- Page Header-->
<header class="masthead" style="background-image: url('public/assets/img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Me</h1>
                            <span class="subheading">Have questions? I have answers.</span>
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
                        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                        <div class="my-5">
        
                            <form id="contactForm"  method="post" action="post&message">

                            
                            <div class="form-floating">
                                    <input class="form-control" name="name" type="text" placeholder="Enter votre nom..." required />
                                    <label for="name">Votre nom</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Un nom est requis.</div>
                            </div>
                             

                            <div class="form-floating">
                                    <input class="form-control" name="surname" type="text" placeholder="Enter votre prénom..." required/>
                                    <label for="surname">Votre prénom</label>
                                    <div class="invalid-feedback" data-sb-feedback="surname:required">Un prénom est requis.</div>
                             </div>

                             <div class="form-floating">
                                    <input class="form-control" name="email" type="email" placeholder="Entrer votre email..." required/>
                                    <label for="email">Votre adresse email</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">l'email est requis.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email non valide.</div>
                                </div>

                                <div class="form-floating">
                                    <input class="form-control" name="tel" type="tel" size="10" pattern="^((\+)33|0)[1-9](\d{2}){4}$" maxlength="10" placeholder="Enter votre numéro de téléphone..." required/>
                                    <label for="tel">Votre numéro de téléphone</label>
                                    <div class="invalid-feedback" data-sb-feedback="tel:required">Un numéro de téléphone est requis.</div>
                                </div>


                                <div class="form-floating">
                                    <input class="form-control" name="object" type="text" placeholder="Enter votre objet..." required />
                                    <label for="object">Objet</label>
                                    <div class="invalid-feedback" data-sb-feedback="object:required">Un objet est requis.</div>
                            </div>
                             


                                <div class="form-floating">
                                    <textarea class="form-control" name="message" id="message" placeholder="Entrer votre message ici..." style="height: 12rem" required></textarea>
                                    <label for="message">Message</label>
                                    <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                </div>
                           
                                <br/>
    
                                <br />
                          
                   
                                <!-- Submit Button-->
                                <button id="submitButton" class="btn btn-primary btn-lg" type="submit">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>