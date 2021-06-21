<?php if ( !is_page( ['register', 'login'] ) ):
?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-ribbon">
                <span><?php esc_html_e( 'Get in Touch', 'bts_blogits' )?></span>
            </div>
            <?php dynamic_sidebar( 'footer-widget' );?>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a href="index.html" class="logo">
                        <?php the_custom_logo();?>
                    </a>
                </div>
                <div class="col-md-7">
                    <p>&copy; Copyright <?php the_time( 'Y' )?>. All Rights Reserved.</p>
                </div>
                <div class="col-md-3">

                    <?php wp_nav_menu( [
                    		'theme_location' => 'footer',
                    		'container'      => 'nav',
                    		'container_id'   => 'submenu',
                    ] )?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php endif;?>
</div>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script type="text/javascript">

			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12345678-1']);
			_gaq.push(['_trackPageview']);

			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script>
		 -->


<script type="text/javascript">
const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});
</script>
<?php wp_footer();?>
</body>

</html>