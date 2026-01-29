<?php do_action('ifrs_concursos_before_archive'); ?>

<section class="concursos">
  <?php echo do_blocks( '<!-- wp:query-title {"type":"archive","level":2,"showPrefix":false,"className":"mb-4"} /-->' ); ?>

  <?php load_template(plugin_dir_path(__FILE__) . 'filter.php'); ?>

  <?php if (have_posts()) : ?>
    <?php load_template(plugin_dir_path(__FILE__) . 'loop.php'); ?>
  <?php else : ?>
    <?php if (is_search()) : ?>
      <div class="alert alert-danger" role="alert">
        <p><?php _e('N&atilde;o foram encontrados Concursos com os termos buscados.'); ?></p>
      </div>
    <?php else : ?>
      <div class="alert alert-warning" role="alert">
        <p><strong><?php _e('Ops!'); ?></strong>&nbsp;<?php _e('N&atilde;o foram encontrados Concursos publicados.', 'ifrs-portal-plugin-concursos'); ?></p>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</section>

<?php do_action('ifrs_concursos_after_archive'); ?>
