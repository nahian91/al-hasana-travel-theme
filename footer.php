<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alhasanatheme
 */
?>

<!-- Footer Section Start -->
<footer class="footer-section fix bg-cover" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/footer/footer-bg.jpg);">
    <div class="container">
        <div class="footer-widget-wrapper-new">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-8 col-sm-6 wow fadeInUp wow" data-wow-delay=".2s">
                    <div class="single-widget-items text-center">
                        <div class="widget-head">
                            <a href="index.php">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="img">
                            </a>
                        </div>
                        <div class="footer-content">
                            <?php 
                                $footer_about = get_field('footer_about', 'option');

                                if( $footer_about ) {
                                    $footer_about_desc   = $footer_about['footer_about_desc'];
                                    $footer_about_fb_link   = $footer_about['footer_about_fb_link'];
                                    $footer_about_tw_link   = $footer_about['footer_about_tw_link'];
                                    $footer_about_ln_link   = $footer_about['footer_about_ln_link'];
                                    $footer_about_ins_link   = $footer_about['footer_about_ins_link'];
                                }
                            ?>

                            <h3>About Us</h3>
                            <p><?php echo $footer_about_desc;?></p>
                            <div class="social-icon d-flex align-items-center justify-content-center">
                                <?php if( !empty($footer_about_fb_link) ) : ?>
                                    <a href="<?php echo esc_url($footer_about_fb_link); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if( !empty($footer_about_tw_link) ) : ?>
                                    <a href="<?php echo esc_url($footer_about_tw_link); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                <?php endif; ?>
                                <?php if( !empty($footer_about_ln_link) ) : ?>
                                    <a href="<?php echo esc_url($footer_about_ln_link); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <?php endif; ?>
                                <?php if( !empty($footer_about_ins_link) ) : ?>
                                    <a href="<?php echo esc_url($footer_about_ins_link); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 ps-lg-5 wow fadeInUp wow" data-wow-delay=".4s">
                    <div class="single-widget-items">
                        <div class="widget-head">
                            <h4>Quick Links</h4>
                        </div>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-1',
                            'menu_class'     => 'list-items',
                            'container'      => false,
                            'fallback_cb'    => false
                        ) );
                        ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ps-lg-5 wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="single-widget-items">
                        <div class="widget-head">
                            <h4>Services</h4>
                        </div>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-2',
                            'menu_class'     => 'list-items',
                            'container'      => false,
                            'fallback_cb'    => false
                        ) );
                        ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ps-xl-5 wow fadeInUp wow" data-wow-delay=".6s">
                    <div class="single-widget-items">
                        <div class="widget-head">
                            <h4>Contact Us</h4>
                        </div>
                        <div class="contact-info">

                            <?php 
                                $footer_contact = get_field('footer_contact', 'option');

                                if( $footer_contact ) {
                                    $footer_phone   = $footer_contact['footer_phone'];
                                    $footer_email   = $footer_contact['footer_email'];
                                    $footer_address   = $footer_contact['footer_address'];
                                }
                            ?>

                            <div class="contact-items">
                                <div class="icon">
                                    <i class="fa-regular fa-location-dot"></i>
                                </div>
                                <div class="content">
                                    <?php if( !empty($footer_address) ) : ?>
                                        <h6><?php echo esc_html($footer_address); ?></h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="contact-items">
                                <div class="icon">
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <?php if( !empty($footer_email) ) : ?>
                                        <h6><a href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a></h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="contact-items">
                                <div class="icon">
                                    <i class="fa-regular fa-phone"></i>
                                </div>
                                <div class="content">
                                    <h6>
                                        <?php 
                                        if( !empty($footer_phone) ) {
                                            if( is_array($footer_phone) ) {
                                                foreach( $footer_phone as $phone ) {
                                                    echo '<a href="tel:' . esc_attr($phone) . '">' . esc_html($phone) . '</a><br>';
                                                }
                                            } else {
                                                echo '<a href="tel:' . esc_attr($footer_phone) . '">' . esc_html($footer_phone) . '</a>';
                                            }
                                        }
                                        ?>
                                    </h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-wrapper">
                <p class="wow fadeInUp" data-wow-delay=".5s">
                    Design & Developed by <a href="https://infinityflamesoft.com/" target="_blank" rel="noopener">Infinity Flame Soft</a>.
                </p>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer-3',
                    'menu_class'     => 'bottom-list',
                    'container'      => false,
                    'fallback_cb'    => false
                ) );
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
