<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
<?php while ( have_posts() ) : the_post(); ?>
  <div class="col">
    <article class="card h-100">
      <div class="card-header">
        <?php $status = get_the_terms(get_the_ID(), 'concurso_status'); ?>
        <?php if ($status && is_post_type_archive('concurso')) : ?>
          <span class="badge text-bg-info p-2"><?php echo $status[0]->name; ?></span>
        <?php endif; ?>
      </div>
      <div class="card-body">
        <h3 class="card-title fs-5 mb-3">
          <a href="<?php the_permalink(); ?>" class="stretched-link text-decoration-none">
            <?php the_title(); ?>
          </a>
        </h3>

        <?php the_excerpt(); ?>
      </div>
    </article>
  </div>
<?php endwhile; ?>
</div>
