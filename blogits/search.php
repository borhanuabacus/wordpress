<?php get_header();?>
<div id="search">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-posts">
                    <?php if ( have_posts() ):

                    		while ( have_posts() ): the_post();
                    		?>
                    <article class="post post-medium">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="post-image">
                                    <div class="img-thumbnail">
                                        <?php the_post_thumbnail( ['class' => 'img-responsive'] )?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">

                                <div class="post-content">

                                    <h2><a href="<?php esc_url( the_permalink() );?>"><?php the_title()?></a>
                                    </h2>
                                    <p><?php echo wp_trim_words( get_the_content(), 20, '[...]' ) ?> </p>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="post-meta">
                                    <span><i class="fa fa-calendar"></i>
                                        <?Php the_time( 'M d , Y' );?>
                                    </span>
                                    <span><i class="fa fa-user"></i> By <a href=""><?php the_author();?></a>
                                    </span>

                                    <?php the_tags( '<span><i class="fa fa-tag"></i> <a href="#">', ',', '</a> </span>' )?>
                                    <span><i class="fa fa-comments"></i> <a
                                            href="#"><?php comments_popup_link( 'No Comments', '1 Comments', '% Comments', 'Comments Disabled' )?></a></span>
                                    <a href="<?php esc_url( the_permalink() );?>"
                                        class="btn btn-xs btn-primary pull-right">Read more...</a>
                                </div>
                            </div>
                        </div>

                    </article>
                    <?php endwhile;
				else: ?>
                    <h1>
                        <?php
    	esc_html_e( 'No Post Found On this Page', 'bts_blogits' );

    ?>
                    </h1>


                    <?php
	get_search_form();
?>

                    <a
                        href="<?php echo esc_url( site_url( '/' ) ) ?>"><?php esc_html_e( 'Go To Home Page', 'bts_blogits' )?></a>
                    <?php

	endif;

?>
                </div>
            </div>
            <div class="col-md-3">
                <?Php get_sidebar()?>
            </div>
        </div>
    </div>
</div>
<?PHP get_footer();?>