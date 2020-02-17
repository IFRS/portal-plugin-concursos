<?php the_post(); ?>

<?php $status = get_the_terms(get_the_ID(), 'concurso_status'); ?>

<article class="concurso">
    <div class="row">
        <div class="col-12">
            <h2 class="concurso__title"><?php the_title(); ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php if ($status) : ?>
                <span class="badge badge-info p-2 mb-4"><?php echo $status[0]->name; ?></span>
            <?php endif; ?>
        </div>
    </div>

    <?php load_template(plugin_dir_path(__FILE__) . 'item.php'); ?>
</article>
