<?php $status = get_the_terms(get_the_ID(), 'concurso_status'); ?>

<?php ob_start(); ?>

<?php do_action('ifrs_concursos_before_single'); ?>

<article class="concurso">
  <?php if ($status) : ?>
      <span class="badge text-bg-info p-2"><?php echo $status[0]->name; ?></span>
  <?php endif; ?>
  <!-- wp:post-title /-->

  <!-- wp:post-content /-->

<?php
  $concurso_files = array();
  $concurso_files['edital'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Edital'];
  }, rwmb_meta('concurso_file' ));

  $concurso_files['edital'] = array_merge(
    $concurso_files['edital'],
    array_map(function($arr){
      return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Edital'];
    }, rwmb_meta('concurso_retifica_files' ))
  );

  $concurso_files['anexos'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Anexos'];
  }, rwmb_meta('concurso_anexos_files' ));

  $concurso_files['cronograma'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Cronograma'];
  }, rwmb_meta('concurso_cronograma_files' ));

  $concurso_files['editais_complementares'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Editais Complementares'];
  }, rwmb_meta('concurso_editais_complementares' ));

  $concurso_files['listas'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Listas'];
  }, rwmb_meta('concurso_listas_files' ));

  $concurso_files['provas'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Provas'];
  }, rwmb_meta('concurso_provas_files' ));

  $concurso_files['gabaritos'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Gabaritos'];
  }, rwmb_meta('concurso_gabaritos_files' ));

  $concurso_files['recursos'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Recursos'];
  }, rwmb_meta('concurso_recursos_files' ));

  $concurso_files['resultados'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Resultados'];
  }, rwmb_meta('concurso_resultado_files' ));

  $concurso_files['nomeia'] = array_map(function($arr){
    return $arr + ['date' => get_the_modified_date('U', $arr['ID']), 'group' => 'Nomeações'];
  }, rwmb_meta('concurso_nomeia_files' ));

  // $concurso_files_sorted = usort($concurso_files, "concurso_files_sort");
?>

<?php if ( !empty( $concurso_files ) ) : ?>
  <section class="concurso__arquivos">
    <ul class="nav nav-pills" role="tablist">
      <?php if (!empty($concurso_files['edital'])) : ?><li class="nav-item" role="presentation"><button class="nav-link active" data-bs-target="#tab-<?php the_ID(); ?>-edital" aria-controls="tab-<?php the_ID(); ?>-edital" role="tab" data-bs-toggle="tab">Edital</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['anexos'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-anexos" aria-controls="tab-<?php the_ID(); ?>-anexos" role="tab" data-bs-toggle="tab">Anexos</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['cronograma'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-cronograma" aria-controls="tab-<?php the_ID(); ?>-cronograma" role="tab" data-bs-toggle="tab">Cronograma</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['editais_complementares'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-editais_complementares" aria-controls="tab-<?php the_ID(); ?>-editais_complementares" role="tab" data-bs-toggle="tab">Editais Complementares</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['listas'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-listas" aria-controls="tab-<?php the_ID(); ?>-listas" role="tab" data-bs-toggle="tab">Listas</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['provas'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-provas" aria-controls="tab-<?php the_ID(); ?>-provas" role="tab" data-bs-toggle="tab">Provas</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['gabaritos'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-gabaritos" aria-controls="tab-<?php the_ID(); ?>-gabaritos" role="tab" data-bs-toggle="tab">Gabaritos</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['recursos'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-recursos" aria-controls="tab-<?php the_ID(); ?>-recursos" role="tab" data-bs-toggle="tab">Recursos</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['resultados'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-resultados" aria-controls="tab-<?php the_ID(); ?>-resultados" role="tab" data-bs-toggle="tab">Resultados</button></li><?php endif; ?>
      <?php if (!empty($concurso_files['nomeia'])) : ?><li class="nav-item" role="presentation"><button class="nav-link" data-bs-target="#tab-<?php the_ID(); ?>-nomeia" aria-controls="tab-<?php the_ID(); ?>-nomeia" role="tab" data-bs-toggle="tab">Nomea&ccedil;&otilde;es</button></li><?php endif; ?>
    </ul>
    <div class="tab-content">
    <?php foreach ($concurso_files as $grupo => $files) : ?>
      <?php if (!empty($files)) : ?>
          <div role="tabpanel" class="tab-pane fade<?php echo ($grupo == 'edital') ? ' show active' : ''; ?>" id="tab-<?php the_ID(); ?>-<?php echo $grupo; ?>">
            <table class="table table-striped concurso__table">
              <thead>
                <tr>
                  <th><?php _e('Publicado em'); ?></th>
                  <th><?php _e('Arquivo'); ?></th>
                  <th><?php _e('Grupo'); ?></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($files as $key => $file) : ?>
                <tr>
                  <td><?php echo date_i18n( 'd/m/Y H:i', $file['date'] ); ?></td>
                  <td>
                    <a href="<?php echo $file['url']; ?>"><strong><?php echo $file['title']; ?></strong></a>
                    <br>
                    <?php echo get_post_field('post_content', $file['ID']); ?>
                  </td>
                  <td><?php echo $file['group']; ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>
</article>

<?php do_action('ifrs_concursos_after_single'); ?>

<?php echo do_blocks(ob_get_clean()); ?>
