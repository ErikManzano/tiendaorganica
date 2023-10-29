<?php get_header(); ?> 

    <?php while(have_posts()): the_post(); ?>

    <div class="container-fluid imagenes-principales">
        <div class="row imagen-superior imagen">
            <div class="col-md-6 bg-primary">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-sm-8 col-md-6">
                        <div class="contenido text-center text-light py-3">
                            <?php echo get_post_meta( get_the_ID(), 'tiendaOrg_homepage_texto_superior_1', true); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 imagen-fondo" style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'tiendaOrg_homepage_imagen_superior_1', true); ?>)"></div>
        </div> <!--.row END-->

        <div class="row imagen-inferior imagen">
            <div class="col-md-6 bg-secondary">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-sm-8 col-md-6">
                        <div class="contenido text-center py-3">
                            <?php echo get_post_meta( get_the_ID(), 'tiendaOrg_homepage_texto_superior_2', true); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 imagen-fondo" style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'tiendaOrg_homepage_imagen_superior_2', true); ?>);"></div>
        </div>
    </div>


    <?php
        $nosotros = new WP_Query('pagename=nosotros');
        while($nosotros->have_posts() ): $nosotros->the_post();
            get_template_part('template', 'parts/iconos');
        endwhile; wp_reset_postdata();
    ?>

    <section class="productos mt-5 py-5">
        <h1 class="text-center mb-5">Productos</h1>

        <div class="container justify-content-center">

            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12
                );  
            ?>
            <?php 
            $products = wc_get_products($args);

            global $post;
            $columns = wc_get_loop_prop( 'columns' );
            ?>
            <div class="woocommerce columns-<?php echo esc_attr( $columns ); ?>">
            <?php
                woocommerce_product_loop_start();
                foreach ($products as $product) {
                    $post = get_post($product->get_id());
                    setup_postdata($post);
                    wc_get_template_part('content', 'product');
                }
                wp_reset_postdata();
                woocommerce_product_loop_end();
            ?>

            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="contenido text-light text-center">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
                
    
    <div class="pedidos" style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo get_post_meta( get_the_ID(), 'tiendaOrg_homepage_imagen_pedidos', true); ?>);">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="contenido text-light text-center">
                        <p><?php echo get_post_meta( get_the_ID(), 'tiendaOrg_homepage_texto_pedidos', true);?> </p>
                        
                        <?php $productos = get_page_by_title('Productos');?>
                        <a href="<?php echo get_permalink($productos->ID); ?>" class="btn btn-primary justify-content-center text-uppercase">DESCUBRE MÁS PRODUCTOS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>