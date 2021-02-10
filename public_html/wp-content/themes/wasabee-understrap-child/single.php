<?php
defined( 'ABSPATH' ) || exit;
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'loop-templates/content', 'blank' ); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
<?php wp_footer(); ?>
