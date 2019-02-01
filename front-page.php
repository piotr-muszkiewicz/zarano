<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template Name: Frontpage
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zarano
 */

get_header(); ?>


<div class="content clerfix">
    <div class="heading-mobile"><?php the_field('about_company_title'); ?></div>
    <div class="container">
        <aside class="content__aside"  data-aos="fade-right">
            <h2><?php the_field('about_company_slogan'); ?></h2>
            <ul>
                <li><a href="#o_firmie"><?php the_field('about_company_title'); ?></a></li>
                <li><a href="#referencje">Referencje</a></li>
                <li><a href="#nowosci">Nowości</a></li>
            </ul>
        </aside>
        <div class="content__right" id="o_firmie" data-aos="fade-left">
            <header class="heading hide-on-mobile">
                <h2><?php the_field('about_company_title'); ?></h2>
            </header>
			<?php the_field('about_company_description'); ?>            
            <div class="icons-home">
            <?php if ( have_rows('about_company_graphics') ): while ( have_rows('about_company_graphics') ): the_row(); ?>
                <div class="icons-home__item">
                    <img src="<?php the_sub_field('about_company_image'); ?>" alt="<?php the_sub_field('about_company_signature'); ?>">
                    <span><?php the_sub_field('about_company_signature'); ?></span>
                </div>
            	<?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</div>

<?php 
	$references_args = array(
 		'post_type' => 'referencje',
        'order' => 'DESC'
    );
    $references_query = new WP_Query( $references_args );
?>
<?php if ( $references_query->have_posts() ): ?>
<div class="heading-mobile">Referencje</div>
<div class="ref-slider js-ref-slider clerfix" id="referencje" data-aos="fade-up">
    <?php while ( $references_query->have_posts() ): $references_query->the_post(); ?>
    <div class="ref-slider__item">
        <div class="ref-slider__inner container">
            <div class="ref-slider__img" style="background-image: url('<?php the_post_thumbnail_url('large'); ?>')"></div>
            <div class="ref-slider__left">
                <header class="heading heading--white">
                    <h2>Referencje</h2>
                </header>
                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" target="_blank" class="read-more">Zobacz więcej</a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>

<div class="heading-mobile">Nowości</div>
<div class="news-list" id="nowosci" data-aos="fade-up">
    <div class="container">
        <header class="heading hide-on-mobile">
            <h2>Nowości</h2>
        </header>
        <div class="news-list__container js-news-list">
            <?php 
                $news_args = array(
                    'post_type' => 'post',
                    'post_per_page' => -1
                );
                $news_query = new WP_Query( $news_args );
            ?>
            <?php if ( $news_query->have_posts() ): while ( $news_query->have_posts() ): $news_query->the_post();  ?>
            
                <div class="news-list__item">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
        
            <?php endwhile; endif; ?>
        </div>

    </div>
</div>

<?php
get_footer();
