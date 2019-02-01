<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zarano
 */

?>

<footer class="footer" data-aos="fade">
    <div class="container">
        <div class="footer__left">
            <div class="footer__logos">
                <?php if( get_field('footer_logos', 'options') ): ?>
                <img src="<?php the_field('footer_logos', 'options'); ?>" /></a>
				<?php endif; ?>
            </div>
        </div>
        <div class="footer__right">
            <?php wp_nav_menu( array( 'menu' => 3, 'container'=> false) ); ?>
        </div>
    </div>
</footer>

<div class="fundusze" data-aos="fade">
    <div class="container">
        
        <?php if ( have_rows('logos_ue', 'options') ): ?>
        <div class="fundusze__logos">
            <?php while ( have_rows('logos_ue', 'options') ): the_row(); ?>
            <img src="<?php the_sub_field('logos_ue_item'); ?>" alt="">
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        
        <?php if ( get_field('information_ue', 'options') ): ?>
        <div class="fundusze__text">
            <p><?php the_field('information_ue', 'options'); ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="copyright__left"><?php the_field('copyright', 'options'); ?></div>
        <div class="copyright__right"><?php the_field('footer_author', 'options'); ?></div>
    </div>
</div>

<div class="loader">
    <svg version="1.1" id="Warstwa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1500 1500" style="enable-background:new 0 0 1500 1500;" xml:space="preserve">
    <style type="text/css">
        .st0{fill:#ADABAA;}
        .st1{fill:url(#SVGID_1_);}
        .st2{fill:url(#SVGID_2_);}
        .st3{fill:url(#SVGID_3_);}
        .st4{fill:url(#SVGID_4_);}

        @keyframes opacity {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 1;
            }
        }
        #Warstwa_1 {
            animation: opacity 1s infinite;
        }
    </style>
    <g>
        <polygon class="st0" points="1401.3,131 1401.3,1368.3 742.5,1368.3 742.5,1171.5 810.8,1171.5 810.8,1300 1333,1300 1333,199.3
            228.3,199.3 228.3,1028.9 342.8,1028.9 342.8,1213.7 49.5,1213.7 49.5,1028.9 160,1028.9 160,131 	">
        </polygon>
    </g>
    <g>

            <rect x="80.3" y="1282" transform="matrix(1.390191e-02 -0.9999 0.9999 1.390191e-02 -1189.2351 1426.316)" class="st0" width="96.4" height="68.3"/>
    </g>
    <g>

            <rect x="212.9" y="1282" transform="matrix(1.390191e-02 -0.9999 0.9999 1.390191e-02 -1058.5076 1558.8738)" class="st0" width="96.4" height="68.3"/>
    </g>
    <g>
        <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="498.2495" y1="849.3525" x2="749.0434" y2="849.3525">
            <stop  offset="0" style="stop-color:#45FF3C"/>
            <stop  offset="0.8855" style="stop-color:#1A88C4"/>
        </linearGradient>
        <path class="st1" d="M543.3,572.8c18.2,24.8,35.4,50.2,55,74.2c36.4,44.7,83.1,80.9,136,111.7c6.7,3.9,14.1,12.1,14.1,18.3
            c0.8,114,0.6,228,0.5,342c0,2.2-0.8,4.4-1.3,6.8C536.8,1025.4,432.1,776.8,543.3,572.8z"/>
    </g>
    <g>
        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="812.8348" y1="613.6818" x2="999.7284" y2="613.6818">
            <stop  offset="0" style="stop-color:#45FF3C"/>
            <stop  offset="0.8855" style="stop-color:#1A88C4"/>
        </linearGradient>
        <path class="st2" d="M812.8,370.8c23.3,15,44.4,27.5,64.1,41.4c45.5,32.2,81.7,70.9,113,113.2c13.4,18.1,9.8,36.7,7.5,55.1
            c-14.3,111.1-73.5,202-177,272.4c-1.5,1-3.5,1.7-7.6,3.6C812.8,695.1,812.8,535,812.8,370.8z"/>
    </g>
    <g>
        <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="810.5721" y1="891.453" x2="1060.8667" y2="891.453">
            <stop  offset="0" style="stop-color:#45FF3C"/>
            <stop  offset="0.8855" style="stop-color:#1A88C4"/>
        </linearGradient>
        <path class="st3" d="M812.3,1128.7c-0.7-7.7-1.6-12.7-1.6-17.7c-0.1-58.1-0.4-116.2,0.4-174.4c0.1-6.8,4.3-16.4,10.5-20
            C934.3,852.1,1009.1,765,1045,654.2c20.6,30.6,23,144.4-4.1,219.7C1002.1,981.7,926.6,1065.6,812.3,1128.7z"/>
    </g>
    <g>
        <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="586.0147" y1="537.7567" x2="748.0271" y2="537.7567">
            <stop  offset="0" style="stop-color:#45FF3C"/>
            <stop  offset="0.8855" style="stop-color:#1A88C4"/>
        </linearGradient>
        <path class="st4" d="M748,371.7c0,111.5,0,219.4,0,332.1c-19-14.3-35.7-25.6-50.7-38.2c-49.7-41.8-86-90.8-109.7-146.4
            c-2.2-5.1-2.4-13.1,0.9-17.3C629.6,450,681.5,407.3,748,371.7z"/>
    </g>
    </svg>


</div>

<?php wp_footer(); ?>

</body>
</html>
