<?php
if ( ! function_exists('concursos_post_type') ) {
    function concursos_post_type() {
        $labels = array(
            'name'               => _x( 'Concursos', 'Post Type General Name', 'ifrs-portal-common-plugin' ),
            'singular_name'      => _x( 'Concurso', 'Post Type Singular Name', 'ifrs-portal-common-plugin' ),
            'menu_name'          => __( 'Concursos', 'ifrs-portal-common-plugin' ),
            'name_admin_bar'     => __( 'Concursos', 'ifrs-portal-common-plugin' ),
            'parent_item_colon'  => __( 'Concurso principal:', 'ifrs-portal-common-plugin' ),
            'all_items'          => __( 'Todos os Concursos', 'ifrs-portal-common-plugin' ),
            'add_new_item'       => __( 'Adicionar Novo Concurso', 'ifrs-portal-common-plugin' ),
            'add_new'            => __( 'Adicionar Novo', 'ifrs-portal-common-plugin' ),
            'new_item'           => __( 'Novo Concurso', 'ifrs-portal-common-plugin' ),
            'edit_item'          => __( 'Editar Concurso', 'ifrs-portal-common-plugin' ),
            'update_item'        => __( 'Atualizar Concurso', 'ifrs-portal-common-plugin' ),
            'view_item'          => __( 'Ver Concurso', 'ifrs-portal-common-plugin' ),
            'search_items'       => __( 'Buscar Concurso', 'ifrs-portal-common-plugin' ),
            'not_found'          => __( 'Não encontrado', 'ifrs-portal-common-plugin' ),
            'not_found_in_trash' => __( 'Não encontrado na Lixeira', 'ifrs-portal-common-plugin' ),
        );
        $capabilities = array(
			// meta caps (don't assign these to roles)
			'edit_post'              => 'edit_concurso',
			'read_post'              => 'read_concurso',
			'delete_post'            => 'delete_concurso',

			// primitive/meta caps
			'create_posts'           => 'create_concursos',

			// primitive caps used outside of map_meta_cap()
			'edit_posts'             => 'edit_concursos',
			'edit_others_posts'      => 'manage_concursos',
			'publish_posts'          => 'manage_concursos',
			'read_private_posts'     => 'read',

			// primitive caps used inside of map_meta_cap()
			'read'                   => 'read',
			'delete_posts'           => 'manage_concursos',
			'delete_private_posts'   => 'manage_concursos',
			'delete_published_posts' => 'manage_concursos',
			'delete_others_posts'    => 'manage_concursos',
			'edit_private_posts'     => 'edit_concursos',
			'edit_published_posts'   => 'edit_concursos',
		);
        $args = array(
            'label'               => __( 'concurso', 'ifrs-portal-common-plugin' ),
            'description'         => __( 'Concursos', 'ifrs-portal-common-plugin' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'revisions' ),
            'taxonomies'          => array( 'concurso_status' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-id-alt',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => array( 'concurso', 'concursos' ),
            'map_meta_cap'        => true,
            'capabilities'        => $capabilities,
            'rewrite'             => array('slug' => 'concursos'),
        );
        register_post_type( 'concurso', $args );
    }

    // Hook into the 'init' action
    add_action( 'init', 'concursos_post_type', 1 );
}

// MetaBox
function concursos_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Arquivos Associados', 'ifrs-portal-common-plugin' ),
        'post_types' => 'concurso',
        'fields'     => array(
            array(
                'id'               => 'concurso_file',
                'name'             => __( 'Edital', 'ifrs-portal-common-plugin' ),
                'desc'             => __('Envio do Edital original do Concurso', 'ifrs-portal-common-plugin' ),
                'type'             => 'file_advanced',
                'max_file_uploads' => 1,
            ),
            array(
                'id'               => 'concurso_retifica_files',
                'name'             => __( 'Retificações', 'ifrs-portal-common-plugin' ),
                'desc'             => __('Envio das retificações ao Edital', 'ifrs-portal-common-plugin' ),
                'type'             => 'file_advanced',
            ),
            array(
                'id'               => 'concurso_anexos_files',
                'name'             => __( 'Anexos', 'ifrs-portal-common-plugin' ),
                'desc'             => __('Envio dos Anexos do Edital', 'ifrs-portal-common-plugin' ),
                'type'             => 'file_advanced',
            ),
            array(
                'id'               => 'concurso_cronograma_files',
                'name'             => __( 'Cronograma', 'ifrs-portal-common-plugin' ),
                'desc'             => __('Envio dos arquivos referentes ao cronograma.', 'ifrs-portal-common-plugin' ),
                'type'             => 'file_advanced',
            ),
            array(
                'id'               => 'concurso_provas_files',
                'name'             => __( 'Provas', 'ifrs-portal-common-plugin' ),
                'desc'             => __('Envio dos arquivos referentes às provas', 'ifrs-portal-common-plugin' ),
                'type'             => 'file_advanced',
            ),
            array(
                'id'               => 'concurso_resultado_files',
                'name'             => __( 'Resultados', 'ifrs-portal-common-plugin' ),
                'desc'             => __('Envio dos arquivos referentes aos resultados', 'ifrs-portal-common-plugin' ),
                'type'             => 'file_advanced',
            ),
            array(
                'id'               => 'concurso_nomeia_files',
                'name'             => __( 'Nomeações', 'ifrs-portal-common-plugin' ),
                'desc'             => __('Envio dos arquivos referentes as nomeações.', 'ifrs-portal-common-plugin' ),
                'type'             => 'file_advanced',
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'concursos_meta_boxes' );
