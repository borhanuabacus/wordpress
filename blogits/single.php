<?php get_header()?>
<?php get_template_part( 'template-parts/inc', 'breadcrumb' );?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="blog-posts single-post">
                <?php while ( have_posts() ): the_post();
                		gt_set_post_view();
                	?>
                <article class="post post-large blog-single-post">
                    <div class="post-image">
                        <?php the_post_thumbnail( ['class' => 'img-fluid'] )?>
                    </div>
                    <div class="post-date">
                        <span class="day"><?php the_time( 'd' );?></span>
                        <span class="month"><?php the_time( 'M' );?></span>
                    </div>

                    <div class="post-content">

                        <h2><?php the_title();?></a></h2>

                        <div class="post-meta">
                            <span><i class="fa fa-user"></i> By <a href="#"><?php the_author();?></a> </span>
                            <span><i class="fa fa-comments"></i> <a
                                    href="#"><?php comments_popup_link( 'No Comments', '1 Comments', '% Comments', 'Comments Disabled' )?></a></span>
                        </div>
                        <?php the_content()?>
                        <div class="post-block post-share">
                            <h3><i class="fa fa-share"></i>Share this post</h3>

                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                <a class="addthis_button_tweet"></a>
                                <a class="addthis_button_pinterest_pinit"></a>
                                <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript"
                                src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>

                        </div>

                        <div class="post-block post-author clearfix">
                            <h3><i class="fa fa-user"></i><?php the_author_firstname();?></h3>
                            <?php the_author_description();?>
                        </div>

                        <?php comments_template()?>

                    </div>
                </article>
                <?php endwhile;?>
            </div>
        </div>
        <div class="col-md-3">
            <?php get_sidebar();?>
        </div>
    </div>

</div>
<?php get_footer()?>