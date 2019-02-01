<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * Template Name: Page 404
 * 
 * @package zarano
 */

get_header(); ?>

<div class="page404" data-aos="fade">
    <div class="container">
        <h2><?php the_field('info', 94); ?></h2>
        <a href="<?php bloginfo('url'); ?>" class="btn"><?php echo esc_html__('Powrót do strony głównej', 'zarano'); ?></a>
    </div>
</div>

<?php
get_footer();
