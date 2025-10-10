<?php get_header(); ?>

<!-- breadcrumb-wrapper Section Start -->
<section class="breadcrumb-wrapper fix bg-cover"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/breadcrumb.jpg);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </div>
</section>

<section class="activities-details-section fix section-padding">
    <div class="container">
        <div class="activities-details-wrapper">
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="airlines-content">
                        <h4><?php the_title();?></h4>
                        <?php the_content();?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="main-sideber">

                        <!-- Contact Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4>Contact Us</h4></div>
                            <div class="news-widget-categories visa-contact">
                                <?php 
                                    $contact_phone  = get_field('contact_phone', 'option');
                                    $contact_email  = get_field('contact_email', 'option');
                                    $contact_address = get_field('contact_address', 'option');
                                ?>
                                <ul>
                                    <?php if (!empty($contact_phone)) : ?>
                                        <li><i class="fa-regular fa-phone"></i> <?php echo esc_html($contact_phone); ?></li>
                                    <?php endif; ?>

                                    <?php if (!empty($contact_email)) : ?>
                                        <li><i class="fa-regular fa-envelope"></i> <?php echo esc_html($contact_email); ?></li>
                                    <?php endif; ?>

                                    <?php if (!empty($contact_address)) : ?>
                                        <li><i class="fa-regular fa-location-dot"></i> <?php echo esc_html($contact_address); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        </div>

                        <!-- Visa Services -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4>Visa Services</h4></div>
                            <div class="recent-post-area">
                                <?php
                                $visa_services = new WP_Query(array(
                                    'post_type'      => 'visa-service',
                                    'posts_per_page' => 5,
                                    'post_status'    => 'publish',
                                ));
                                if ($visa_services->have_posts()) :
                                    while ($visa_services->have_posts()) : $visa_services->the_post(); ?>
                                    <div class="recent-items">
                                        <div class="recent-thumb visa-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail('thumbnail', ['alt' => get_the_title()]);
                                                } else {
                                                    echo '<img src="' . get_template_directory_uri() . '/assets/img/news/default.jpg" alt="default">';
                                                } ?>
                                            </a>
                                        </div>
                                        <div class="recent-content">
                                            <ul><li>Visa</li></ul>
                                            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                        </div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); endif; ?>
                            </div>
                        </div>

                        <!-- Tour Packages -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4>Tour Packages</h4></div>
                            <?php
                            $tours = new WP_Query(array(
                                'post_type'      => 'tour',
                                'posts_per_page' => 3,
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'tour_category',
                                        'field'    => 'slug',
                                        'terms'    => 'tour-packages',
                                    ),
                                ),
                            ));
                            if ($tours->have_posts()) : ?>
                            <div class="recent-post-area">
                                <?php while ($tours->have_posts()) : $tours->the_post(); ?>
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('thumbnail', ['alt' => get_the_title()]);
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/assets/img/news/default.jpg" alt="default">';
                                        } ?>
                                    </div>
                                    <div class="recent-content">
                                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <!-- Tour Packages -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4>Hajj Packages</h4></div>
                            <?php
                            $tours = new WP_Query(array(
                                'post_type'      => 'tour',
                                'posts_per_page' => 3,
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'tour_category',
                                        'field'    => 'slug',
                                        'terms'    => 'hajj-packages',
                                    ),
                                ),
                            ));
                            if ($tours->have_posts()) : ?>
                            <div class="recent-post-area">
                                <?php while ($tours->have_posts()) : $tours->the_post(); ?>
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('thumbnail', ['alt' => get_the_title()]);
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/assets/img/news/default.jpg" alt="default">';
                                        } ?>
                                    </div>
                                    <div class="recent-content">
                                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                            <?php endif; ?>
                        </div>

                        <!-- Tour Packages -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4>Umrah Packages</h4></div>
                            <?php
                            $tours = new WP_Query(array(
                                'post_type'      => 'tour',
                                'posts_per_page' => 3,
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'tour_category',
                                        'field'    => 'slug',
                                        'terms'    => 'umrah-packages',
                                    ),
                                ),
                            ));
                            if ($tours->have_posts()) : ?>
                            <div class="recent-post-area">
                                <?php while ($tours->have_posts()) : $tours->the_post(); ?>
                                <div class="recent-items">
                                    <div class="recent-thumb">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('thumbnail', ['alt' => get_the_title()]);
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/assets/img/news/default.jpg" alt="default">';
                                        } ?>
                                    </div>
                                    <div class="recent-content">
                                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
