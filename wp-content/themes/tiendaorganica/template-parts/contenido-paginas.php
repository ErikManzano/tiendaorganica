<?php
    $html = tiendaOrg_imagen_destacada( get_the_ID() );
    // $html[0] return HTML
    // $html[0] return image

    echo $html[0];
?>


<main class="container">
    <div class="row justify-content-center">
        <div class="py-3 px-5 contenido-pagina bg-light <?php echo $html[1] ? 'col-md-8 destacada' : 'col-md-12 no-destacada'; ?>">
            <h2 class="text-center my-5"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    </div> <!--Row-->
</main>