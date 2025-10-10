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

<?php 
$post_id = get_the_ID();

// Get submitted form data
$citizen   = isset($_GET['citizen']) ? sanitize_text_field($_GET['citizen']) : '';
$travel_to = isset($_GET['travel_to']) ? sanitize_text_field($_GET['travel_to']) : '';
$category  = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

// Get ACF fields
$visa_name     = get_field('visa_processing_name', $post_id);
$visa_category = get_field('visa_processing_category', $post_id);
$visa_features = get_field('visa_processing_features', $post_id);
$visa_price = get_field('visa_processing_price', $post_id);
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
                        <h2><?php echo esc_html($visa_name); ?> - <?php echo esc_html($visa_category); ?></h2>

                        <div class="visa-processing-content">
                            <p><strong>Citizen Of:</strong> <?php echo esc_html($citizen); ?></p>
                            <p><strong>Traveling To:</strong> <?php echo esc_html($travel_to); ?></p>
                            <p><strong>Visa Category:</strong> <?php echo esc_html($category); ?></p>
                        </div>

                        <h3>Required Documents / Features:</h3>
                        <?php if (is_array($visa_features)) : ?>
                            <ul class="visa-process-features">
                                <?php foreach ($visa_features as $feature) : 
                                    $name = $feature['visa_processing_features_name'] ?? '';
                                    $desc = $feature['visa_processing_features_description'] ?? '';
                                ?>
                                    <li><strong><?php echo esc_html($name); ?>:</strong> <?php echo esc_html($desc); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p><?php echo esc_html($visa_features); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="main-sideber">

                       <!-- Book Now Form -->
<div class="single-sidebar-widget visa-prces-bok">
    <div class="wid-title ok-change">
        <h4>
            <span>
                <?php if ($visa_category) : ?>
                <?php echo esc_html($visa_category); ?>
            <?php endif; ?>
            </span>
            <br>
            <?php if ($visa_price) : ?>
                ৳<?php echo esc_html($visa_price); ?>
            <?php endif; ?>
        </h4>
    </div>
    <div class="comment-form-wrap">
        <form action="#" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-clt">
                        <span>Full Name</span>
                        <input type="text" name="visitor_name" placeholder="Enter name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-clt">
                        <span>Phone</span>
                        <input type="text" name="visitor_phone" placeholder="Enter phone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-clt">
                        <span>Email</span>
                        <input type="email" name="visitor_email" placeholder="Enter email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-clt">
                        <button type="submit" class="theme-btn w-100">Submit Visa Request</button>
                    </div>
                </div>
            </div>
        </form>
    </div>                    
</div>

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

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
