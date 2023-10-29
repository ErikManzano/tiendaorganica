<?php get_header(); ?>
    <section class="container">
         <div class="row justify-content-center">
            <div class="col-12 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/img/404.png" alt="Oppps" class="img-fluid imagen-404">
            <h2><span>Oops!!</span> Contenido no encontrado</h2>
                <p>Selecciona:</p>
                <a href="<?php echo esc_url(home_url('/')); ?>"><button class="btn btn-primary">Volver al inicio</button></a> 
                <?php $contacto = get_page_by_title('Contacto'); ?>
                <a href="<?php echo get_permalink($contacto->ID) ?>"><button class="btn btn-primary">Envia un mensaje</button></a> 
            </div>
        </div>
    </section>
<?php get_footer(); ?> 