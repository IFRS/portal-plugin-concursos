<?php
if ( ! function_exists( 'concurso_status_taxonomy' ) ) {
    // Register Custom Taxonomy
    function concurso_status_taxonomy() {
        $labels = array(
            'name'                       => _x( 'Status de Concurso', 'Taxonomy General Name', 'ifrs-portal-common-plugin' ),
            'singular_name'              => _x( 'Status de Concurso', 'Taxonomy Singular Name', 'ifrs-portal-common-plugin' ),
            'menu_name'                  => __( 'Status', 'ifrs-portal-common-plugin' ),
            'all_items'                  => __( 'Todas os Status', 'ifrs-portal-common-plugin' ),
            'parent_item'                => __( 'Status pai', 'ifrs-portal-common-plugin' ),
            'parent_item_colon'          => __( 'Status pai:', 'ifrs-portal-common-plugin' ),
            'new_item_name'              => __( 'Novo Status', 'ifrs-portal-common-plugin' ),
            'add_new_item'               => __( 'Adicionar Novo Status', 'ifrs-portal-common-plugin' ),
            'edit_item'                  => __( 'Editar Status', 'ifrs-portal-common-plugin' ),
            'update_item'                => __( 'Atualizar Status', 'ifrs-portal-common-plugin' ),
            'separate_items_with_commas' => __( 'Status separadas por vírgula', 'ifrs-portal-common-plugin' ),
            'search_items'               => __( 'Buscar Status', 'ifrs-portal-common-plugin' ),
            'add_or_remove_items'        => __( 'Adicionar ou remover Status', 'ifrs-portal-common-plugin' ),
            'choose_from_most_used'      => __( 'Escolher pelo Status mais usado', 'ifrs-portal-common-plugin' ),
            'not_found'                  => __( 'Não encontrado', 'ifrs-portal-common-plugin' ),
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
$single_term_campus = new Taxonomy_Single_Term( 'concurso_status' );
$single_term_campus->set( 'priority', 'default' );
// $single_term_campus->set( 'context', 'normal' );
$single_term_campus->set( 'metabox_title', __( 'Status', 'ifrs-portal-common-plugin' ) );
$single_term_campus->set( 'force_selection', true );
$single_term_campus->set( 'indented', false );
$single_term_campus->set( 'allow_new_terms', false );
