<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?> >

    <header class="header py-3">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4 col-8 mb-4 mb-md-0 text-center">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">

                        <?php 
                            $opciones = get_option('tiendaOrg_theme_options');
                            if(isset($opciones['logotipo'])): ?>
                                <img class="img-fluid logo" src="<?php echo $opciones['logotipo']; ?>" alt="Logo" width="300" height="100">
                            <?php else: ?>
                                <img class="img-fluid logo" src="<?php echo get_template_directory_uri(); ?>/img/logo-ejemplo.svg" alt="Logo" width="300" height="100">
                            <?php endif;
                        ?>
                    </a>
                </div> <!--.col-md-4-->

                <div class="col-md-8">
                    <nav class="navbar navbar-expand-sm navbar-light justify-content-center">
                        <button class="navbar-toggler g mb-4" type="button" data-bs-toggle="collapse" data-bs-target="#nav_principal" aria-controls="nav_principal" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <?php
                            $args = array (
                                'menu_class' => 'nav nav-justified flex-column flex-md-row text-center',
                                'container_id' => 'nav_principal',
                                'container_class' => 'collapse navbar-collapse justify-content-center text-uppercase justify-content-lg-end',
                                'theme_location' => 'menu_principal'
                            );
                            wp_nav_menu($args);
                        ?>
                    </nav>
                </div> <!--.col-md-8 END-->
            </div> <!--row END-->
        </div> <!--container END-->
    </header>