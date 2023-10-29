<?php

/** Metaboxes Pagina Inicio */
add_action( 'cmb2_admin_init', 'tiendaOrg_campos_homepage' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function tiendaOrg_campos_homepage() {
    $prefix  ='tiendaOrg_homepage_';
    
    $id_home = get_option('page_on_front');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$tiendaOrg_campos_homepage = new_cmb2_box( array(
		'id'           => $prefix . 'homepage',
		'title'        => esc_html__( 'Campos Inicio', 'cmb2' ),
		'object_types' => array( 'page' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
		'show_on'      => array(
			'id' => array( $id_home ),
		), // Specific post IDs to display this metabox
	) );

    $tiendaOrg_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Superior 1', 'cmb2' ),
		'desc'    => esc_html__( 'Texto para la parte superior del sitio web', 'cmb2' ),
		'id'      => $prefix . 'texto_superior_1',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

    $tiendaOrg_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Hero 1', 'cmb2' ),
		'desc' => esc_html__( 'Primera imagen para la parte superior', 'cmb2' ),
		'id'   => $prefix . 'imagen_superior_1',
		'type' => 'file',
	) );

    $tiendaOrg_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Superior 2', 'cmb2' ),
		'desc'    => esc_html__( 'Texto para la parte superior del sitio web', 'cmb2' ),
		'id'      => $prefix . 'texto_superior_2',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

    $tiendaOrg_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Hero 2', 'cmb2' ),
		'desc' => esc_html__( 'Primera imagen para la parte superior', 'cmb2' ),
		'id'   => $prefix . 'imagen_superior_2',
		'type' => 'file',
	) );
    
    // Campos pedidos
    $tiendaOrg_campos_homepage->add_field( array(
		'name'    => esc_html__( 'Texto Pedidos', 'cmb2' ),
		'desc'    => esc_html__( 'Añade el texto para la parte de los envios', 'cmb2' ),
		'id'      => $prefix . 'texto_pedidos',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

    $tiendaOrg_campos_homepage->add_field( array(
		'name' => esc_html__( 'Imagen Fondo Pedidos', 'cmb2' ),
		'desc' => esc_html__( 'Imagen de fondo para la parte de pedidos', 'cmb2' ),
		'id'   => $prefix . 'imagen_pedidos',
		'type' => 'file',
	) );
}



add_action( 'cmb2_admin_init', 'tiendaOrg_seccion_nosotros' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function tiendaOrg_seccion_nosotros() {
	$prefix = 'tiendaOrg_group_';

	/**
	 * Repeatable Field Groups
	 */
	$tiendaOrg_iconos = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Iconos con descripcion', 'cmb2' ),
		'object_types' => array( 'page' ),
		'context'	   => 'normal',
		'priority'	   => 'high',
		'show_names'   => 'true',
		'show_on'	   => array(
			'key' 	   => 'page-template',
			'value'    => 'page-iconos.php'
		)
	) );

	$tiendaOrg_iconos->add_field( array(
		'name' => esc_html__( 'Titulo Sección', 'cmb2' ),
		'desc' => esc_html__( 'Añada un titulo para la sección', 'cmb2' ),
		'id'   => $prefix . 'titulo_iconos',
		'type' => 'text',
	) );

	// $group_field_id is the field id string, so in this case: 'yourprefix_group_demo'
	$group_field_id = $tiendaOrg_iconos->add_field( array(
		'id'          => $prefix . 'nosotros',
		'type'        => 'group',
		'description' => esc_html__( 'Agregue opciones segun sea neceario', 'cmb2' ),
		'options'     => array(
			'group_title'    => esc_html__( 'Caracteristica {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'     => esc_html__( 'Agregar Otro Grupo', 'cmb2' ),
			'remove_button'  => esc_html__( 'Eliminar', 'cmb2' ),
			'sortable'       => true,
			// 'closed'      => true, // true to have the groups closed by default
			// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
		),
	) );

	$tiendaOrg_iconos->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Titulo', 'cmb2' ),
		'id'         => 'titulo_icono',
		'type'       => 'text',
	) );

	$tiendaOrg_iconos->add_group_field( $group_field_id, array(
		'name'        => esc_html__( 'Descripción', 'cmb2' ),
		'description' => esc_html__( 'Agregue una descripción a esta caracteristica', 'cmb2' ),
		'id'          => 'desc_icono',
		'type'        => 'textarea_small',
	) );

	$tiendaOrg_iconos->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Icono', 'cmb2' ),
		'id'   => 'imagen_icono',
		'type' => 'file',
	) );
}

add_action( 'cmb2_admin_init', 'tiendaOrg_campos_galeria' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function tiendaOrg_campos_galeria() {
    $prefix  ='tiendaOrg_galeria_';
    
    $id_home = get_option('page_on_front');
	/**
	 * Metabox to be displayed on a single page ID
	 */
	$tiendaOrg_galeria = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Galería de Imágenes', 'cmb2' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => 'true',
		'show_on'	   => array(
			'key' 	   => 'page-template',
			'value'    => 'page-galeria.php'
		)
 	) );

	$tiendaOrg_galeria->add_field( array(
		'name'         => esc_html__( 'Imagenes', 'cmb2' ),
		'desc'         => esc_html__( 'Suba aqui las imágenes de la galeria.', 'cmb2' ),
		'id'           =>  $prefix . 'imagenes',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
}

