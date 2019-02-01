<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zarano
 */

get_header(); ?>


<div class="content-text">
    <div class="container">
        <time class="content-text__time"><?php the_time('j F Y'); ?></time>
        <div class="content-text__inner text">
            <header class="heading">
                <h3><?php the_title(); ?></h3>
            </header>
            <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                <?php the_content(); ?>
                <?php if ( is_singular('referencje') ): ?>
                    <?php if ( get_field('references_link') ): ?>
                        <a href="<?php the_field('references_link'); ?>" title="Zobacz referencję">Zobacz referencję</a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<div class="nav-page">
    <div class="container">
        
        <?php if ( is_singular('realizacje') ): ?>
            <?php previous_post_link( '%link', 'Poprzednia realizacja', FALSE ); ?>
            <?php next_post_link( '%link', 'Następna realizacja', FALSE ); ?>            
        <?php else: ?>
            <?php previous_post_link( '%link', 'Poprzednia nowość', TRUE ); ?>
            <?php next_post_link( '%link', 'Następna nowość', TRUE ); ?>
        <?php endif; ?>
    </div>
</div>


<?php
get_footer();
