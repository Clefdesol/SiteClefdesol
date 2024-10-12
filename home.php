<?php get_header(); ?>

<!-- Thème de la page ACTUALITéS -->

   
    <div class="px-4 py-5 my-5 text-center">

                <h1 class="display-5 fw-bold"><?php echo get_the_title(12); ?></h1>

                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4"><?php the_field('chapeau',12); ?></p>
                </div>

    <!-- La liste des articles -->
        <div class="container">
            
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="feature col">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="icon-link">Lire la suite ...
                            </a>
                        </div>

                <?php endwhile; endif; ?>

        </div>
    <!-- Fin de la liste des articles -->
     <!-- Pagination, vient de function.php -->
     <?php echo bootstrap_pagination(); ?>

     <!-- FIN de pagination, vient de function.php -->
        

    </div>
<!-- Fin du thème de la page ACTUALITéS -->

<?php get_footer(); ?>

