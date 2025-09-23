<?php
/*
Template Name: Hajj Packages
*/

get_header();
?>

        <!-- breadcrumb-wrappe-Section Start -->
        <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/breadcrumb/breadcrumb.jpg);">
            <div class="container">
                <div class="row">
                    <div class="page-heading">
                        <h2><?php the_title();?></h2>
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="<?php echo site_url();?>">Home</a>
                            </li>
                            <li><i class="fa-regular fa-chevrons-right"></i></li>
                            <li><?php the_title();?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="tour-section section-padding fix">
    <div class="container custom-container">
        <div class="tour-destination-wrapper">
            <div class="row g-4">
                <?php
                $tours = new WP_Query(array(
                    'post_type'      => 'tour',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'tour_category',
                            'field'    => 'slug',
                            'terms'    => 'hajj-packages',
                        ),
                    ),
                ));

                if ($tours->have_posts()) :
                    while ($tours->have_posts()) : $tours->the_post();
                        $tour_location = get_field('location');
                        $tour_days     = get_field('days');
                        $tour_peoples  = get_field('peoples');
                        $tour_price    = get_field('price');
                        ?>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="destination-card-items mt-0">
                                <div class="destination-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                                    <?php else: ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/news/default.jpg'); ?>" alt="default">
                                    <?php endif; ?>
                                </div>
                                <div class="destination-content">
                                    <ul class="meta">
                                        <li>
                                            <i class="fa-regular fa-location-dot"></i>
                                            <?php echo esc_html($tour_location); ?>
                                        </li>
                                    </ul>
                                    <h5>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
                                    <ul class="info">
                                        <li>
                                            <i class="fa-regular fa-clock"></i>
                                            <?php echo esc_html($tour_days); ?>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-users"></i>
                                            <?php echo esc_html($tour_peoples); ?>
                                        </li>
                                    </ul>
                                    <div class="price">
                                        <h6>৳<?php echo esc_html($tour_price); ?></h6>
                                        <a href="<?php the_permalink(); ?>" class="theme-btn style-2">
                                            View Details <i class="fa-regular fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();
                else : ?>
                    <p><?php esc_html_e('No tours found.', 'your-text-domain'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

        <?php get_footer();?>