<div class="row">
    <div class="col-12 col-lg-9 concursos">
        <h2 class="concursos__title">
            <?php
            _e('Concursos');

            if (is_tax('concurso_status')) {
                echo '&nbsp;', strtolower(single_term_title('', false));
            }

            if (is_search() && get_search_query()) : ?>
                <small>(Resultados da busca por &ldquo;<?php echo get_search_query(); ?>&rdquo;)</small>
            <?php endif; ?>
        </h2>
        <?php if (have_posts()) : ?>
            <?php load_template(plugin_dir_path(__FILE__) . 'loop.php'); ?>
        <?php else : ?>
                <?php if (is_search()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php printf(__('N&atilde;o foram encontrados Concursos %s com os termos buscados.'), single_term_title('', false)); ?></p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        <p><strong><?php _e('Aguarde!'); ?></strong>&nbsp;<?php printf(__('Ainda n&atilde;o h&aacute; Concursos %s cadastrados.'), strtolower(single_term_title('', false))); ?></p>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="col-12 col-lg-3">
        <aside>
            <div class="row">
                <div class="col-12">
                    <h3><?php _e('Status'); ?></h3>
                    <ul class="side-list">
                    <?php
                        wp_list_categories(array(
                            'title_li' => '',
                            'taxonomy' => 'concurso_status',
                            'hide_empty' => false,
                        ));
                    ?>
                    </ul>
                </div>
            </div>
            <br>
            <?php if (is_tax('concurso_status')) : ?>
                <a href="<?php echo get_post_type_archive_link( 'concurso' ); ?>" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<?php _e('Todos os Concursos'); ?></a>
            <?php endif; ?>
        </aside>
    </div>
</div>
