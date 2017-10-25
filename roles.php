<?php
// Fix Media Permissions
add_action('init', function() {
    global $wp_post_types;
    $wp_post_types['attachment']->cap->edit_posts = 'edit_files';
    $wp_post_types['attachment']->cap->delete_posts = 'delete_files';
});

// Roles
register_activation_hook(__FILE__, function () {
    if (!get_role('cadastrador_concursos')) {
        add_role('cadastrador_concursos', __('Cadastrador de Concursos'), array(
            'read'                   => true,
            'upload_files'           => true,
            'edit_files'             => true,
            'delete_files'           => false,

            'create_concursos'       => true,
            'publish_concursos'      => true,
            'edit_concursos'         => true,
            'delete_concursos'       => false,

            'assign_concurso_status' => true
        ));
    }

    if (!get_role('gerente_concursos')) {
        add_role('gerente_concursos', __('Gerente de Concursos'), array(
            'read'                   => true,
            'upload_files'           => true,
            'edit_files'             => true,
            'delete_files'           => true,

            'create_concursos'       => true,
            'publish_concursos'      => true,
            'edit_concursos'         => true,
            'delete_concursos'       => true,

            'assign_concurso_status' => true
        ));
    }
});

register_deactivation_hook(__FILE__, function () {
    if (get_role('cadastrador_concursos')) {
        remove_role('cadastrador_concursos');
    }
    if (get_role('gerente_concursos')) {
        remove_role('gerente_concursos');
    }
});
