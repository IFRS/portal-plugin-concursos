<?php
// Fix Media Permissions
add_action('init', function() {
    global $wp_post_types;
    $wp_post_types['attachment']->cap->edit_posts = 'edit_uploads';
    $wp_post_types['attachment']->cap->delete_posts = 'delete_uploads';
});

// Roles
function ifrs_portal_concursos_addRoles() {
    $admin = get_role('administrator');
    $admin->add_cap('create_concursos');
    $admin->add_cap('publish_concursos');
    $admin->add_cap('edit_concursos');
    $admin->add_cap('delete_concursos');
    $admin->add_cap('assign_concurso_status');
    $admin->add_cap('manage_concurso_status');
    $admin->add_cap('edit_concurso_status');
    $admin->add_cap('delete_concurso_status');

    if (!get_role('cadastrador_concursos')) {
        add_role('cadastrador_concursos', __('Cadastrador de Concursos'), array(
            'read'                   => true,
            'upload_files'           => true,
            'edit_uploads'           => true,
            'delete_uploads'         => false,

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
            'edit_uploads'           => true,
            'delete_uploads'         => true,

            'create_concursos'       => true,
            'publish_concursos'      => true,
            'edit_concursos'         => true,
            'delete_concursos'       => true,

            'assign_concurso_status' => true
        ));
    }
}

function ifrs_portal_concursos_removeRoles() {
    $admin = get_role('administrator');
    $admin->remove_cap('create_concursos');
    $admin->remove_cap('publish_concursos');
    $admin->remove_cap('edit_concursos');
    $admin->remove_cap('delete_concursos');
    $admin->remove_cap('assign_concurso_status');
    $admin->remove_cap('manage_concurso_status');
    $admin->remove_cap('edit_concurso_status');
    $admin->remove_cap('delete_concurso_status');

    if (get_role('cadastrador_concursos')) {
        remove_role('cadastrador_concursos');
    }
    if (get_role('gerente_concursos')) {
        remove_role('gerente_concursos');
    }
}
