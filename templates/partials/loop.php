<?php $accordion_id = uniqid(); ?>
<div class="accordion" id="accordion-<?php echo $accordion_id; ?>" role="tablist" aria-multiselectable="true">
<?php while (have_posts()) : the_post(); ?>
    <div class="card concurso">
        <div class="card-header" role="tab" id="heading-<?php the_ID(); ?>">
        <?php $status = get_the_terms(get_the_ID(), 'concurso_status'); ?>
        <?php if ($status && is_post_type_archive('concurso')) : ?>
            <span class="badge badge-info p-2"><?php echo $status[0]->name; ?></span>
        <?php endif; ?>
            <h3>
                <a href="<?php the_permalink(); ?>" class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-target="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
        </div>
        <div id="collapse-<?php the_ID(); ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>" data-parent="#accordion-<?php echo $accordion_id; ?>">
            <div class="card-body">
                <?php load_template(plugin_dir_path(__FILE__) . 'item.php', false); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</div>
