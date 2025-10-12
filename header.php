<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alhasanatheme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Back To Top Start -->
<button id="back-top" class="back-to-top">
    <i class="fa-regular fa-arrow-up"></i>
</button>

<!--<< Mouse Cursor Start >>-->  
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>

<!-- Header Section Start -->
<header class="header-section-10">
    <div class="header-top-section-new">
        <div class="container-fluid">
            <div class="header-top-wrapper-new">
                <div class="social-icon d-flex align-items-center">
                    <?php 
                    $header_infos_social = get_field('header_infos_social', 'option');

                    if ( $header_infos_social ) {
                        $fb  = !empty($header_infos_social['header_infos_fb_link']) ? $header_infos_social['header_infos_fb_link'] : '';
                        $tw  = !empty($header_infos_social['header_infos_tw_link']) ? $header_infos_social['header_infos_tw_link'] : '';
                        $ln  = !empty($header_infos_social['header_infos_ln_link']) ? $header_infos_social['header_infos_ln_link'] : '';
                        $ins = !empty($header_infos_social['header_infos_ins_link']) ? $header_infos_social['header_infos_ins_link'] : '';
                    }
                    ?>

                    <span>Follow Us</span>
                    <?php if( $fb ) : ?>
                        <a href="<?php echo esc_url($fb); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>
                    <?php if( $tw ) : ?>
                        <a href="<?php echo esc_url($tw); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if( $ln ) : ?>
                        <a href="<?php echo esc_url($ln); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                    <?php if( $ins ) : ?>
                        <a href="<?php echo esc_url($ins); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                </div>

                <ul class="top-right">
                    <?php 
                        $header_infos = get_field('header_infos', 'option');

                        if( $header_infos ) {
                            $hours = !empty($header_infos['header_infos_office_hours']) ? $header_infos['header_infos_office_hours'] : '';
                            $email = !empty($header_infos['header_infos_email']) ? $header_infos['header_infos_email'] : '';
                            $phone = !empty($header_infos['header_infos_phone']) ? $header_infos['header_infos_phone'] : '';
                        }
                    ?>

                    <?php if( $email ) : ?>
                        <li>
                            <i class="fa-regular fa-envelope"></i>
                            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if( $hours ) : ?>
                        <li>
                            <i class="fa-regular fa-clock"></i><?php echo esc_html($hours); ?>
                        </li>
                    <?php endif; ?>

                    <?php if( $phone ) : ?>
                        <li>
                            <i class="fa-regular fa-phone"></i>
                            <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                        </li>
                    <?php endif; ?>
                    <li class="user-dropdown">
<?php if ( is_user_logged_in() ) : 
    $current_user = wp_get_current_user(); ?>
    <a href="#" class="dropdown-toggle">
        <?php echo esc_html( $current_user->display_name ); ?>
    </a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo esc_url( home_url('/dashboard/') ); ?>">Dashboard</a></li>
        <li><a href="<?php echo esc_url( home_url('/b2b-package/') ); ?>">All Packages</a></li>
        <li><a href="<?php echo esc_url( home_url('/b2b-visa/') ); ?>">All Visas</a></li>
        <li><a href="<?php echo wp_logout_url( home_url('/') ); ?>">Logout</a></li>
    </ul>
<?php else : ?>
    <a href="<?php echo home_url('/login/'); ?>">Login / Register</a>
<?php endif; ?>
</li>




                </ul>
            </div>
        </div>
    </div>

    <div id="header-sticky" class="header-11">
        <div class="container-fluid">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo">
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="logo-img">
                        </a>
                        <div class="logo-2">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="header-right d-flex justify-content-end align-items-center">
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-1',
                                        'menu_class'     => '', 
                                        'container'      => false,
                                        'fallback_cb'    => false,
                                    ) );
                                    ?>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
