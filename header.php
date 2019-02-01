<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zarano
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header"  data-aos="fade">
    <div class="container">
        <?php if( get_field('logo', 'options') ): ?>
		<a href="<?php bloginfo('url'); ?>" class="header__logo" title="<?php bloginfo('description'); ?>"><img src="<?php the_field('logo', 'options'); ?>" /></a>
		<?php endif; ?>
        
        <a href="#" class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <nav class="header__nav">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 2, 'container'=> false) ); ?>
        </nav>
    </div>
</div>

<?php if ( is_front_page() ): ?>
	<div class="infografika"  data-aos="fade">
	    <div class="infografika__inner">
	        <?php the_field('svg_graphic', 'options'); ?>
	    </div>
	</div>
<?php elseif ( is_404() ): ?>
	
	<div class="subpage_img" data-aos="fade" style="background-image: url('<?php echo get_the_post_thumbnail_url(94, 'header-size'); ?>')"></div>
<?php else: ?>
	<div class="subpage_img" data-aos="fade" style="background-image: url('<?php the_post_thumbnail_url('header-size'); ?>')"></div>
<?php endif; ?>