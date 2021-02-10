<?php
defined('ABSPATH') || exit;
require_once(get_stylesheet_directory() . '/Wasabee_WP_Footerwalker.php');
require_once(get_stylesheet_directory() . '/inc/blocks-registerer.php');

$footerId = 'Main-footer';
$footer = wp_get_nav_menu_object($footerId);
?>

<footer class='Footer'>
	<div class='Footer__headingContainer'>
        <p class='Footer__social__heading'>
            <?php the_field('header_intro', $footer) ?>
        </p>
            
		<div class='Footer__social'>
            <?php while( have_rows('social_media', $footer) ): the_row(); 
                $icon = get_sub_field('icon');
                $link = get_sub_field('link');
            ?>

            <a href="<?= $link ?>" > 
                <img class="LinkIcon__icon" src="<?= $icon['url'] ?>">
            </a>

            <?php endwhile; ?>
        </div>
    </div>
    <div class="Footer__Contact">
        <div class="Contact__Container">
            <div class="Contact__SocialMedia">
                <i class="fa fa-home SocialMedia__icon"></i>
                <span> Stanisława Mikołajczyka 4/6, 45-271 Opole </span>
            </div>
            <div class="Contact__SocialMedia">
                <i class="fa fa-envelope SocialMedia__icon"></i>
                <span> biuro@radioemiter.pl </span>
            </div>
        </div>
        <div class="Contact__map">
            <?php echo do_shortcode( '[leaflet-map lat=50.68267323974674 lng=17.947304248809818 zoom=15]' ); ?>
            <?php echo do_shortcode( '[leaflet-marker lat=50.68254425578579 lng=17.94348478317261]' ); ?>
        </div>
    </div>

	<div class='Footer__legal'>
		<h6 class='Footer__legal__info'>
			<?php the_field('legal_info', $footer) ?>
		</h6>
    </div>
    
</footer>


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
</body>
</html>
