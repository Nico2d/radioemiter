<?php
defined('ABSPATH') || exit;
require_once(get_stylesheet_directory() . '/Wasabee_WP_Navwalker.php');

$menuId = 'main-menu';
$menu = wp_get_nav_menu_object($menuId);
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php the_title(); ?></title>
	<script src="wp-content/themes/wasabee-understrap-child/src/js/musicPlayer.js"  type="text/javascript"></script> <!-- przenieść do funtion.php -> inc/setup.php   -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	<!-- przenieść do funtion.php -> inc/setup.php   -->
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<?php wp_head(); ?>

	<script type="text/javascript">
		// <![CDATA[
		$(document).ready(function() {
			$.ajaxSetup({ cache: false }); 
			$('#MusicPlayer').load('<?= get_stylesheet_directory_uri(); ?>' + '/audioPlayer.php');
			setInterval(function() {
				console.log("refresh");
				$('#MusicPlayer').load('<?= get_stylesheet_directory_uri(); ?>' + '/audioPlayer.php');
			}, 100000000); 
		});
		// ]]>
	</script>
</head>

<body <?php body_class(); ?>>
	<?php do_action('wp_body_open'); ?>

	<audio id="musicPlayer">
		<source src="http://www.radioemiter.pl:8000/emiter.ogg" type="audio/ogg; codecs=vorbis">
		<source src="http://radioemiter.pl:8000/emiter.mp3" type="audio/ogg; codecs=vorbis">
	</audio>

	
	<div class="MusicPlayer__Container Container" >	
		<div style="position: absolute; left: 50%;">
			<div class="MusicPlayer" id="MusicPlayer"> <!-- Player here generated --> </div>


			<div class="MusicPlayer__Controls">
				<div class="Controls__button"> <i onclick="playMusic()" id='playButton' class="fas fa-play"></i> </div>
				<div class="Controls__volume">
					<div class="Controls__button"> <i onclick="muteMusic()" id="muteButton" class="fas fa-volume-up"></i> </div>
					<input type="range" min="0" max="100" value="30" class="slider" id="volume">
				</div>
			</div>
		</div>
	</div>
	
	


	<div>
		<div class='HeaderWrapper Container' id="Header">
			<header class="Header" aria-expanded="false" aria-label="Toggle navigation">
				<a class="Header__logoLink" href="/">
					<img
						class="Header__logoLink__logo"
						src="<?php the_field('logo', $menu) ?>"
						alt="<?php echo get_bloginfo('name') ?>"
					>
				</a>

				<?php wp_nav_menu([
					'menu' => $menuId,
					'theme_location' => 'primary',
					'container_class' => 'Header__contentWrapper',
					'container' => 'nav',
					'menu_class' => 'Header__content',
					'menu_id' => $menuId,
					'walker' => new Wasabee_WP_Navwalker()
				]); ?>

				<button class="Header__toggler">
					<ul class='Header__toggler__icon'>
						<li class='Header__toggler__iconLine'></li>
						<li class='Header__toggler__iconLine'></li>
						<li class='Header__toggler__iconLine'></li>
					</ul>
					<span class='Header__toggler__text'>Menu</span>
				</button>
			</header>
		</div>
		<div class="Whitespace-4"></div>
