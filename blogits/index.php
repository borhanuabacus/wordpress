<?php get_header();?>
<div class="feature_post_container">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3><?php esc_html_e( 'Featured Post', 'bts_blogits' )?></h3>
            </div>
            <?php
echo do_shortcode( '[fpc_post_block limit="5"]' ); ?>
        </div>
    </div>
</div>
<div class="blog_post_container">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 Class="recent_post">
                    <?php esc_html_e( 'Recent Post', 'bts_blogits' );?>
                </h2>
            </div>
            <div class="col-md-9">
                <div class="blog-posts">
                    <?php if ( have_posts() ):

                    		while ( have_posts() ): the_post();
                    		?>
                    <article class="post post-medium">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="post-image">
                                    <?php the_post_thumbnail( ['class' => 'img-responsive'] )?>
                                </div>
                            </div>
                            <div class="col-md-7">

                                <div class="post-content">

                                    <h2><a href="<?php esc_url( the_permalink() );?>"><?php the_title()?></a>
                                    </h2>
                                    <p><?php echo wp_trim_words( get_the_content(), 30, '[...]' ) ?> </p>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="post-meta">
                                    <span><i class="fa fa-calendar"></i>
                                        <?Php the_time( 'M d , Y' );?>
                                    </span>
                                    <span><i class="fa fa-user"></i> By
                                        <?php the_author_posts_link();?>
                                    </span>
                                    <span><i class="fa fa-eye" aria-hidden="true"><?=gt_get_post_view();?></i></span>

                                    <?php the_tags( '<span><i class="fa fa-tag"></i> <a href="#">', ',', '</a> </span>' )?>
                                    <span><i class="fa fa-comments"></i> <a
                                            href="<?php the_permalink();?>"><?php comments_popup_link( 'No Comments', '1 Comments', '% Comments', 'Comments Disabled' )?></a></span>
                                    <a href="<?php esc_url( the_permalink() );?>"
                                        class="btn btn-xs btn-primary pull-right"><?php esc_html_e( 'Read more...', 'bts_blogits' );?></a>
                                </div>
                            </div>
                        </div>

                    </article>
                    <?php endwhile;
		                    	else:
		                    		esc_html_e( 'No Post Found On this Page', 'bts_blogits' );

		                    	endif;

		                    ?>
                    <div class="pagination_div text-right">
                        <?php

                        	$args = [
                        		'prev_text' => '«',
                        		'next_text' => '»',
                        	];
                        echo get_the_posts_pagination( $args )?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_sidebar()?>
            </div>
        </div>

    </div>
</div>
<?php get_footer();?>