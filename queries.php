<?php
function ifrs_concursos_custom_queries( $query ) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_post_type_archive('concurso') || $query->is_tax('concurso_status')) {
            $query->set('posts_per_page', -1);
            $query->set('nopaging', true);
            $query->set('orderby', 'modified');
            $query->set('order', 'DESC');
        }
    }
}

add_action( 'pre_get_posts', 'ifrs_concursos_custom_queries' );
