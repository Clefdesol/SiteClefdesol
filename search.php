<?php get_header(); ?>

<!-- HEROES de la page d'accueil -->
   
    <div class="px-4 py-3 my-5 text-center">




                <h1 class="display-5 fw-bold">Résultat de votre recherche</h1>

                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">
                        <?php global $wp_query; $count = $wp_query->found_posts;?>La recherche pour <strong class="blue">"<?php echo the_search_query(); ?>"</strong> a donné <strong  class="blue"><?php echo $count;?></strong> résultat<?php if($count>1) : echo's'; endif; ?> - <?php echo the_date(); ?>
                    </p>
                </div>

                <div class="container"><!-- Résultat de la recherche -->
                    <ul class="list-group">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php global $previousday; $previousday = -1; ?><!-- C'est un fixe qui enléve un bug de "date" -->
                            <li class="list-group-item"> <a href="<?php the_permalink();?>"><?php the_title();?></a><span class="fw-lighter">    - Publié le  <?php echo the_date(); ?></span></li>

                        <?php endwhile; endif; ?>
                    </ul>
                    <div class="h15"></div>
                    <?php if($count===0) : ?>
                        <a href="<?php echo home_url(); ?>" class="btn btn-light">&larr; Retour à l'accueil</a>

                    <?php endif ?>

                </div>

        

    </div>
<!-- Fin HEROES de la page d'accueil -->

<?php get_footer(); ?>

