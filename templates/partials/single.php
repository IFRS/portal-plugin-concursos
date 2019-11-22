<article id="concurso">
    <div class="row">
        <div class="col-12">
            <?php $status = get_the_terms(get_the_ID(), 'concurso_status'); ?>
            <h2 class="title"><?php the_title(); ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php if ($status) : ?>
                <span class="label label-primary pull-right"><?php echo $status[0]->name; ?></span>
            <?php endif; ?>
        </div>
    </div>

    <?php load_template(plugin_dir_path(__FILE__) . 'item.php'); ?>
</article>
<div class="row">
    <div class="col-12">
        <?php get_template_part('partials/share-buttons'); ?>
    </div>
</div>
