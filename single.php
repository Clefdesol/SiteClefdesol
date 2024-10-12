<?php get_header(); ?>

<!-- HEROES de la page d'accueil -->
   
    <div class="px-4 py-5 my-5 text-center">

        <img class="d-block mx-auto mb-4" src="<?php echo get_template_directory_uri();?>/img/logo.svg" alt="" width="200" height="200">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <h1 class="display-5 fw-bold"><?php the_title(); ?></h1>

                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">Publié le <?php the_date();?> par <?php the_author();?></p>
                </div>

                <div class="container"><!-- Le texte de la page d'accueil -->
                    <p><?php the_content(); ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 text-start">
                            <?php previous_post_link();?>
                        </div>
                        <div class="col-md-6 text-end">
                            <?php next_post_link();?>
                        </div>
                        <dic class="h15"></dic>
                    </div>
                    <a href="<?php echo get_permalink(12) ?>" class="btn btn-light">&larr; Retour aux actualités</a>
                </div>

        <?php endwhile; endif; ?>

    </div>
<!-- Fin HEROES de la page d'accueil -->

<?php get_footer(); ?>

