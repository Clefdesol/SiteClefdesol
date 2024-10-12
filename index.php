<?php get_header(); ?>

<!-- HEROES de la page d'accueil -->
   
    <div class="px-4 py-3 my-5 text-center">

        <img class="d-block mx-auto mb-4" src="<?php echo get_template_directory_uri();?>/img/logo.svg" alt="" width="20%" height="20%">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <h1 class="display-5 fw-bold"><?php the_title(); ?></h1>

                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4"><?php the_field('chapeau')  ?></p>
                </div>

                <div class="container"><!-- Le texte de la page d'accueil -->
                    <p><?php the_content(); ?></p>
                </div>

        <?php endwhile; endif; ?>

    </div>
<!-- Fin HEROES de la page d'accueil -->

<?php get_footer(); ?>

