<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template Name: Offer
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zarano
 */

get_header(); ?>

<div class="content clerfix">
    <div class="heading-mobile"><?php the_title(); ?></div>
    <div class="container">
        <aside class="content__aside"  data-aos="fade-right">
            <h2><?php the_title(); ?></h2>
            <ul>
                <?php if ( have_rows('offer') ): $i = 1; while ( have_rows('offer') ): the_row(); ?>
                <li><a href="#oferta<?php echo $i; ?>"><?php the_sub_field('offer_title'); ?></a></li>
                <?php $i++; endwhile; endif; ?>
            </ul>
        </aside>
        <div class="content__right"  data-aos="fade-left">
            <header class="heading">
                <h3><?php the_field('offer_slogan'); ?></h3>
            </header>
            <p><?php the_field('offer_description'); ?></p>
        </div>
    </div>
</div>

<div class="offer-list js-offer-list">
    
    <?php if ( have_rows('offer') ): $j = 1; while ( have_rows('offer') ): the_row(); ?>
    
    <div class="offer-list__item" id="oferta<?php echo $j; ?>">
        <div class="container">
            <div class="offer-list__right"  data-aos="fade-left">
                <?php 
                    $offer_image = get_sub_field('offer_image');
                    $size = 'large';
                    $offer_image_thumb = $offer_image['sizes'][ $size ];
                
                if ( !empty( $offer_image ) ): ?>
                <img src="<?php echo $offer_image_thumb; ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="offer-list__left"  data-aos="fade-right">
                <header class="heading">
                    <h2><?php the_sub_field('offer_title'); ?></h2>
                </header>
                <p><?php the_sub_field('offer_sub_description'); ?></p>
                <?php $file = get_sub_field('offer_file'); ?>
                <?php if ( $file ): ?>
                <a href="<?php echo $file; ?>" class="download">Pobierz</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?php $j++; endwhile; endif; ?>

</div>

<?php
get_footer();
