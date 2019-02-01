<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template Name: Contact
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zarano
 */

get_header(); ?>

<div class="contact">
    <div class="container">
        <div class="contact__inner">
            <div class="contact__left" data-aos="fade-right">
                <header class="heading">
                    <h2><?php the_title(); ?></h2>
                </header>
                <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
            <div class="contact__right" data-aos="fade-left">
                <h3>Skontaktuj się z nami wypełniając formularz.</h3>
                <?php echo do_shortcode('[contact-form-7 id="30" title="Formularz 1"]'); ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
