<?php get_header(); ?>

<!-- HEROES de la page d'accueil -->
   
    <div class="px-4 py-3 my-5 text-center">
 

                <h1 class="display-5 fw-bold">Erreur 404</h1>

                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Page introuvable</p>
                    <p>Cette page n'existe pas ou plus</p>
                </div>
                <img class="d-block mx-auto mb-4" src="<?php echo get_template_directory_uri();?>/img/dessin404.jpg" alt="" width="50%" height="50%">
                <div class="container">
                <a href="<?php echo home_url(); ?>" class="btn btn-light">&larr; Retour à l'accueil</a>
                </div>

        

    </div>
<!-- Fin HEROES de la page d'accueil -->

<?php get_footer(); ?>

