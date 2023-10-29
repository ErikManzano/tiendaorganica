<footer class="footer p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <?php 
                        $args = array (
                            'menu_class' => 'navbar navbar-expand-sm navbar-light justify-content-center nav text-uppercase d-flex flex-column flex-md-row text-center text-md-left',
                            'theme_location' => 'menu_principal'
                        );
                        wp_nav_menu( $args );
                    ?>
                </div>
                <div class="col-md-4">
                    <p class="text-center text-md-right copyright mt-4 mt-md-0"> &copy; Todos los derechos reservados <?php echo date('Y'); ?> </p>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>