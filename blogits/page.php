<?php get_header();?>
<div class="container">
    <div class="row">
        <?php if ( !is_page( ['login', 'register'] ) ):
        ?>
        <div class="col-md-9">
            <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ): the_post();?>
            <?php the_content();?>
            <?php endwhile;?>
            <?php endif;?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar();?>
        </div>
        <?php else: ?>
        <div class="col-md-12">
            <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ): the_post();?>
            <?php the_content();?>
            <?php endwhile;?>
            <?php endif;?>
        </div>
        <?php endif;?>
    </div>
</div>
<?php get_footer();?>