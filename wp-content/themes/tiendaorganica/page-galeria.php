<?php get_header();
/**
* Template Name: Galeria de Imágenes
*/
?>

    <?php while(have_posts()): the_post();

        get_template_part('template-parts/contenido', 'paginas');

        $imagenes = get_post_meta(get_the_id(), 'tiendaOrg_galeria_imagenes', true);

        ?>

        <!-- Galería -->
        <main class="container">
            <section id="galeria">          
                <div class="row justify-content-center">
                    <?php foreach($imagenes as $id => $imagen): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#imagen<?php echo $id; ?>">
                            <?php $imagen = wp_get_attachment_image_url( $id, 'full'); ?>
                            <img src="<?php echo $imagen; ?>" alt="Galeria Imagen">
                        </a>
                    </div>
                    <!-- Galería Modal -->
                    <!-- Imagen 1 -->
                    <div id="imagen<?php echo $id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <img src="<?php echo $imagen; ?>" class="img-fluid">
                                </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main> <!-- Galería END -->
                    
    <?php endwhile; ?>

<?php get_footer(); ?>