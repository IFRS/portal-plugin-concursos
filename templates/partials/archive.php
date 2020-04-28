<div class="concursos">
    <div class="concursos__main">
        <h2 class="concursos__title">
            <?php
            _e('Concursos', 'ifrs-portal-plugin-concursos');

            if (is_tax('concurso_status') && !isset($_POST['concurso_status'])) {
                echo '&nbsp;', strtolower(single_term_title('', false));
            }

            if (is_search() && get_search_query()) {
                printf(__('<small>(Resultados com o termo &ldquo;%s&rdquo;)</small>', 'ifrs-portal-plugin-concursos'), get_search_query());
            }

            ?>
        </h2>
        <?php if (have_posts()) : ?>
            <?php load_template(plugin_dir_path(__FILE__) . 'loop.php'); ?>
        <?php else : ?>
                <?php if (is_search()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p><?php _e('N&atilde;o foram encontrados Concursos com os termos buscados.'); ?></p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                    <p><strong><?php _e('Ops!'); ?></strong>&nbsp;<?php printf(__('N&atilde;o foram encontrados Concursos publicados.', 'ifrs-portal-plugin-concursos'), single_term_title('', false)); ?></p>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="concursos__aside">
        <?php load_template(plugin_dir_path(__FILE__) . 'filter.php'); ?>
    </div>
</div>
