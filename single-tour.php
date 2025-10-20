<?php get_header(); ?>

<?php     
$package_banner     = get_field('package_banner'); 
?>

<!-- breadcrumb-wrapper Section Start -->
<section class="breadcrumb-wrapper fix bg-cover"
    style="background-image: url(<?php echo $package_banner;?>);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2><?php the_title(); ?></h2>
                <!-- Down Arrow SVG -->
                <div class="scroll-down-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" viewBox="0 0 24 24">
                        <path d="M12 13.5l-5-5 1.41-1.41L12 10.67l3.59-3.58L17 8.5z"/>
                        <path d="M12 19.5l-5-5 1.41-1.41L12 16.67l3.59-3.58L17 14.5z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
$package_banner     = get_field('package_banner'); 
$tour_description     = get_field('description'); 
$tour_itinerarys      = get_field('itinerarys'); 
$tour_cost_includes   = get_field('cost_includes'); 
$tour_cost_excludes   = get_field('cost_excludes'); 
$tour_features_list   = get_field('features_list'); 
$tour_price_group     = get_field('price_group'); 
$tour_remarks_list    = get_field('remarks_list'); 
?>

<section class="activities-details-section fix section-padding">
    <div class="container">
        <div class="activities-details-wrapper">
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-lg-8">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="details-thumb">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="activities-details-content">
                        <h2 class="mb-3"><?php the_title(); ?></h2>
                        <?php if (!empty($tour_description)) : ?>
                            <p><?php echo esc_html($tour_description); ?></p>
                        <?php endif; ?>

                        <!-- Package Price -->
                        <?php if (!empty($tour_price_group)) : ?>
                        <div class="activities-list-item">
                            <h3>Package Price</h3>
                            <table class="table table-bordered table-responsive">
                                <tr>
                                    <th>Hotel</th>
                                    <th>Person</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                                <?php foreach ($tour_price_group as $price) : ?>
                                    <tr>
                                        <td><?php echo esc_html($price['price_group_hotel'] ?? ''); ?></td>
                                        <td><?php echo esc_html($price['price_group_adult'] ?? ''); ?></td>
                                        <td><?php echo esc_html($price['price_group_description'] ?? ''); ?></td>
                                        <td><?php echo esc_html($price['price_group_price'] ?? ''); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <?php endif; ?>

                        <!-- Tour Features -->
                        <?php if (!empty($tour_features_list)) : 
                            $accommodation  = $tour_features_list['accommodation'] ?? '';
                            $transportation = $tour_features_list['transportation'] ?? '';
                            $departure_from = $tour_features_list['departure_from'] ?? '';
                            $tour_language  = $tour_features_list['tour_language'] ?? '';
                            $fitness_level  = $tour_features_list['fitness_level'] ?? '';
                            $minimum_age    = $tour_features_list['minimum_age'] ?? '';
                            $maximum_age    = $tour_features_list['maximum_age'] ?? '';
                            $meals          = $tour_features_list['meals'] ?? '';
                        ?>
                        <div class="activities-box-wrap">
                            <div class="activities-box-area">
                                <?php if ($accommodation) : ?>
                                <div class="activities-box-item">
                                    <div class="icon"><i class="fa-regular fa-hotel"></i></div>
                                    <div class="content">
                                        <span>Accommodation</span>
                                        <h6><?php echo esc_html($accommodation); ?></h6>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($transportation) : ?>
                                <div class="activities-box-item style-2">
                                    <div class="icon"><i class="fa-regular fa-bus"></i></div>
                                    <div class="content">
                                        <span>Transportation</span>
                                        <h6><?php echo esc_html($transportation); ?></h6>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($departure_from) : ?>
                                <div class="activities-box-item">
                                    <div class="icon"><i class="fa-regular fa-location-dot"></i></div>
                                    <div class="content">
                                        <span>Departure From</span>
                                        <h6><?php echo esc_html($departure_from); ?></h6>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($tour_language) : ?>
                                <div class="activities-box-item">
                                    <div class="icon"><i class="fa-regular fa-language"></i></div>
                                    <div class="content">
                                        <span>Tour Language</span>
                                        <h6><?php echo esc_html($tour_language); ?></h6>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="activities-box-area mb-0">
                                <?php if ($fitness_level) : ?>
                                <div class="activities-box-item">
                                    <div class="icon"><i class="fa-regular fa-shuttle-space"></i></div>
                                    <div class="content">
                                        <span>Fitness Level</span>
                                        <h6><?php echo esc_html($fitness_level); ?></h6>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($meals) : ?>
                                <div class="activities-box-item">
                                    <div class="icon"><i class="fa-regular fa-utensils"></i></div>
                                    <div class="content">
                                        <span>Meals</span>
                                        <h6><?php echo esc_html($meals); ?></h6>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($minimum_age) : ?>
                                <div class="activities-box-item">
                                    <div class="icon"><i class="fa-regular fa-user"></i></div>
                                    <div class="content">
                                        <span>Minimum Age</span>
                                        <h6><?php echo esc_html($minimum_age); ?></h6>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if ($maximum_age) : ?>
                                <div class="activities-box-item">
                                    <div class="icon"><i class="fa-regular fa-user"></i></div>
                                    <div class="content">
                                        <span>Maximum Age</span>
                                        <h6><?php echo esc_html($maximum_age); ?></h6>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Package Includes -->
                        <?php if (!empty($tour_cost_includes)) : ?>
                        <div class="activities-list-item">
                            <h3>Package Includes</h3>
                            <ul class="activities-list">
                                <?php foreach ($tour_cost_includes as $item) : ?>
                                    <li><i class="fa-regular fa-check"></i> <?php echo esc_html($item['cost_includes_list'] ?? ''); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <!-- Package Excludes -->
                        <?php if (!empty($tour_cost_excludes)) : ?>
                        <div class="activities-list-item">
                            <h3>Package Excludes</h3>
                            <ul class="activities-list">
                                <?php foreach ($tour_cost_excludes as $item) : ?>
                                    <li><i class="fa-regular fa-xmark"></i><?php echo esc_html($item['cost_excludes_list'] ?? ''); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <!-- Itinerary -->
                        <?php if (!empty($tour_itinerarys)) : ?>
                        <div class="faq-items">
                            <h3>Itinerary</h3>
                            <div class="faq-accordion">
                                <div class="accordion" id="accordion">
                                    <?php $i = 0; foreach ($tour_itinerarys as $itinerary) : $i++; ?>
                                    <div class="accordion-item mb-3">
                                        <h5 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq<?php echo $i; ?>"
                                                aria-expanded="false"
                                                aria-controls="faq<?php echo $i; ?>">
                                                <?php echo esc_html($itinerary['itinerary_label'] ?? ''); ?>
                                            </button>
                                        </h5>
                                        <div id="faq<?php echo $i; ?>" class="accordion-collapse collapse"
                                            data-bs-parent="#accordion">
                                            <div class="accordion-body">
                                                <p><?php echo esc_html($itinerary['itinerary_description'] ?? ''); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Remarks -->
                        <?php if (!empty($tour_remarks_list)) : ?>
                        <div class="activities-list-item">
                            <h3>Remarks</h3>
                            <ul class="activities-list">
                                <?php foreach ($tour_remarks_list as $item) : ?>
                                    <li><?php echo esc_html($item['remarks_list_title'] ?? ''); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

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

                        <div class="single-sidebar-widget">
                            <div class="comment-form-wrap single-tour-sidebar-booking">
                            <div class="wid-title"><h4>Book Now</h4></div>
                            <?php echo do_shortcode('[contact-form-7 id="aadf1cc" title="Tour Booking Form"]');?>
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
