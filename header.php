<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Theme SiteClefdesol</title> Pas besoin, car contrôler par "add_theme_support("title-tag");" dans function.php-->
     <?php wp_head(); ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="<?php echo get_stylesheet_uri();?>" rel="stylesheet">

  </head>
  <body class="d-flex flex-column h-100">
    <main class="flex-schrink-0">
<!-- HEADER -->
    <div class="container">
        <!-- Logo et nom du site -->
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="<?php echo home_url();?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">

            <img src="<?php echo get_template_directory_uri();?>/img/logo.svg" class="bi me-2" width="70" height="70"  alt="Clefdesol">

                <span class="fs-4"><?php echo bloginfo('name') ?></span>
            </a>
        <!-- Fin logo -->

        <!-- Menu construit avec bootscore (github AlexWebLab) la fonctoion est dans function.php-->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary_menu',// Vient de function.php dans emplacement menu
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="nav nav-pills %2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new bootstrap_5_wp_nav_menu_walker()
            ));
            ?>

            </header>
    </div>
<!-- FIN HEADER -->