<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <!-- Basic -->
    <meta charset="<?php bloginfo( 'charset' );?>">
    <meta name="description" content="<?Php bloginfo( 'description' )?>">
    <meta name="author" content="<?php bloginfo( 'author' )?>">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
    .register_page,
    .login_page {
        background-image: url('<?php echo get_template_directory_uri() . '/img/bg.jpg' ?>');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        min-height: 100vh;
    }
    </style>
    <?php wp_head();?>
</head>

<body <?php body_class()?>>
    <div class="body">
        <?php if ( !is_page( ['register', 'login'] ) ):
        ?>
        <header id="header">

            <?php wp_megamenu( ['theme_location' => 'primary'] );?>


        </header>
        <?php
        	endif;
        ?>
        <div role="main" class="main">
            <?php if ( !is_page( ['register', 'login'] ) ):
            ?>
            <div class="slider-container">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php

                        	$catArgs = [
                        		'category__in' => wp_get_post_categories( $post_id, $args ),
                        		'showposts'    => 10, //display number of posts
                        		'orderby'      => 'DESC', //display random posts
                        		'post__not_in' => [$post->ID],
                        	];

                        	$cat_post_query = new WP_Query( $catArgs );

                        	if ( $cat_post_query->have_posts() ) {
                        	while ( $cat_post_query->have_posts() ): $cat_post_query->the_post();?>
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="item">
                                <?php if ( has_post_thumbnail() ) {
	                                				;
	                                			}
	                                		?>
                                <div class="image">
                                    <a class="thumbnail-link"
                                        href="<?php esc_url( the_permalink() );?>"><?php the_post_thumbnail( 'new_thumb' );?>

                                    </a>
                                </div>
                                <div class="cont">
                                    <h4 class="post-title">
                                        <p><?php the_title();?></p>
                                    </h4>
                                    <p class="post-content">
                                        <?=wp_trim_words( get_the_content(), 10 )?>
                                    </p>

                                    <a href="<?php esc_url( the_permalink() );?>"
                                        class="btn btn-md btn-primary text-center">Read
                                        more...</a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;
	                        	wp_reset_query();}?>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
            <?php endif;?>