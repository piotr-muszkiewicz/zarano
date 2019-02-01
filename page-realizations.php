<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template Name: Realizations
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zarano
 */

get_header(); ?>

<div class="content clerfix">
    <div class="heading-mobile">Oferta</div>
    <div class="container">
        <aside class="content__aside" data-aos="fade-right">
            <h2>Oferta</h2>
            <ul>
                <?php 
                    $realizations_args = array(
                        'post_type' => 'realizacje',
                        'order' => 'DESC'
                    );
                    $realizations_query = new WP_Query( $realizations_args );
                ?>
                <?php if ( $realizations_query->have_posts() ): $i = 1; while ( $realizations_query->have_posts() ): $realizations_query->the_post();  ?>
                <li><a href="#realizacja<?php echo $i; ?>" class="realization-btn"><?php the_title(); ?></a></li>
                <?php $i++; endwhile; endif; wp_reset_postdata(); ?>
            </ul>
        </aside>
        <div class="content__right" data-aos="fade-left">
            <header class="heading">
                <h3><?php the_field('realizations_slogan'); ?></h3>
            </header>
            <p><?php the_field('slogan_description'); ?></p>
        </div>
    </div>
</div>

<div class="work-list">
    <div class="container">
        <?php 
            $realizations_args = array(
                'post_type' => 'realizacje',
                'order' => 'DESC'
            );
            $realizations_query = new WP_Query( $realizations_args );
        ?>
        <?php if ( $realizations_query->have_posts() ): $j = 1; while ( $realizations_query->have_posts() ): $realizations_query->the_post();  ?>
        <div class="work-list__item clerfix" id="realizacja<?php echo $j; ?>" data-aos="fade-up">
            <header class="heading">
                <h2><?php the_field('single_realization_header'); ?></h2>
            </header>
            <div class="work-list__left">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_content(); ?>
            </div>
            <div class="work-list__img" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>')"></div>
        </div>
        <?php $j++; endwhile; endif; ?>
    </div>
</div>

<?php
get_footer();
