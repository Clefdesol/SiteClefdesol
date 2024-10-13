<?php get_header(); ?>

<!-- Template de la page d'accueil -->
   


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-12 col-sm-12 col-lg-6 ">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="d-block mx-lg-auto img-fluid" alt="Coquillage" loading="lazy" width="100%" height=auto>
                </div>

                <div class="col-12 col-sm-12 col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3"><?php the_field('chapeau')  ?></h1>
                    <div class="lead">
                        <?php the_content(); ?>
                    </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href=<?php echo get_the_permalink(12)?> class="btn btn-primary btn-lg px-4 me-md-2">Actualités</a>
                            <a href=<?php echo get_the_permalink(14)?> class="btn btn-outline-secondary btn-lg px-4">Défaut</a>
                        </div>
                </div>
            </div>
        </div>


    <?php endwhile; endif; ?>


<!-- Fin Template de la page d'accueil -->

<?php get_footer(); ?>

