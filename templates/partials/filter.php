<?php
  $status = get_terms(array(
    'taxonomy' => 'concurso_status',
    'hide_empty' => false,
    'orderby' => 'term_order',
  ));

  $has_filter = !empty($_POST['concurso_status']);
?>
<aside class="concursos__filter">
  <details <?php echo ($has_filter) ? 'open' : ''; ?>>
    <summary><?php _e('Filtros', 'ifrs-portal-plugin-concursos'); ?></summary>

    <form action="<?php echo get_post_type_archive_link( 'concurso' ); ?>" method="POST">
      <fieldset>
        <legend>Status</legend>
        <?php foreach ($status as $stat): ?>
          <?php $field_id = uniqid(); ?>
          <?php $stat_check = (isset($_POST['concurso_status']) && in_array($stat->slug, $_POST['concurso_status'])) || is_tax('concurso_status', $stat->slug); ?>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="concurso_status[]" value="<?php echo $stat->slug; ?>" id="<?php echo $field_id; ?>" <?php echo $stat_check ? 'checked' : ''; ?>>
            <label class="form-check-label" for="<?php echo $field_id; ?>"><?php echo $stat->name; ?></label>
          </div>
        <?php endforeach; ?>
      </fieldset>

      <fieldset>
        <div class="btn-group" role="group" aria-label="Ações do Filtro">
          <input type="submit" value="Filtrar" class="btn btn-outline-primary">
          <a href="<?php echo get_post_type_archive_link( 'concurso' ); ?>" class="btn btn-outline-secondary"><?php _e('Limpar', 'ifrs-portal-plugin-concursos'); ?></a>
        </div>
      </fieldset>
    </form>
  </details>
</aside>
