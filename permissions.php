<?php
add_action('init', function() {
    if (get_role( 'cadastrador_concursos' )) {
        remove_role( 'cadastrador_concursos' );
    }
    add_role('cadastrador_cursos', __('Cadastrador de Concursos'), array(
        'read'                   => true,
        'upload_files'           => true,

        'create_concursos'       => true,
        'edit_concursos'         => true,
        'manage_concursos'       => false,

        'assign_concurso_status' => true
    ));
});
