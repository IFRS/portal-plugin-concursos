<?php
if ( ! function_exists( 'concurso_status_taxonomy' ) ) {
    // Register Custom Taxonomy
    function concurso_status_taxonomy() {
        $labels = array(
            'name'                       => _x( 'Status de Concurso', 'Taxonomy General Name', 'ifrs-portal-plugin-concursos' ),
            'singular_name'              => _x( 'Status de Concurso', 'Taxonomy Singular Name', 'ifrs-portal-plugin-concursos' ),
            'menu_name'                  => __( 'Status', 'ifrs-portal-plugin-concursos' ),
            'all_items'                  => __( 'Todas os Status', 'ifrs-portal-plugin-concursos' ),
            'parent_item'                => __( 'Status pai', 'ifrs-portal-plugin-concursos' ),
            'parent_item_colon'          => __( 'Status pai:', 'ifrs-portal-plugin-concursos' ),
            'new_item_name'              => __( 'Novo Status', 'ifrs-portal-plugin-concursos' ),
            'add_new_item'               => __( 'Adicionar Novo Status', 'ifrs-portal-plugin-concursos' ),
            'edit_item'                  => __( 'Editar Status', 'ifrs-portal-plugin-concursos' ),
            'update_item'                => __( 'Atualizar Status', 'ifrs-portal-plugin-concursos' ),
            'separate_items_with_commas' => __( 'Status separadas por vírgula', 'ifrs-portal-plugin-concursos' ),
            'search_items'               => __( 'Buscar Status', 'ifrs-portal-plugin-concursos' ),
            'add_or_remove_items'        => __( 'Adicionar ou remover Status', 'ifrs-portal-plugin-concursos' ),
            'choose_from_most_used'      => __( 'Escolher pelo Status mais usado', 'ifrs-portal-plugin-concursos' ),
            'not_found'                  => __( 'Não encontrado', 'ifrs-portal-plugin-concursos' ),
        );
        $capabilities = array(
    		'manage_terms'       => 'manage_concurso_status',
            'assign_terms'       => 'assign_concurso_status',
    		'edit_terms'         => 'edit_concurso_status',
    		'delete_terms'       => 'delete_concurso_status',
    	);
        $args = array(
            'labels'            => $labels,
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => false,
            'capabilities'      => $capabilities,
            'rewrite'           => array('slug' => 'concursos/status', 'with_front' => false),
        );
        register_taxonomy( 'concurso_status', array( 'concurso' ), $args );
    }

    // Hook into the 'init' action
    add_action( 'init', 'concurso_status_taxonomy', 0 );
}

// Single Term
$single_term_concurso_status = new Taxonomy_Single_Term( 'concurso_status' );
$single_term_concurso_status->set( 'priority', 'default' );
// $single_term_concurso_status->set( 'context', 'normal' );
$single_term_concurso_status->set( 'metabox_title', __( 'Status', 'ifrs-portal-plugin-concursos' ) );
$single_term_concurso_status->set( 'force_selection', true );
$single_term_concurso_status->set( 'indented', false );
$single_term_concurso_status->set( 'allow_new_terms', false );
