<?php
/*
Template Name: Search Tours by Country
*/

get_header();

// Get selected destination from GET
$selected_destination = isset($_GET['tour_destination']) ? sanitize_text_field($_GET['tour_destination']) : '';
?>

<!-- Breadcrumb -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/assets/img/breadcrumb/breadcrumb.jpg'); ?>);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </div>
</section>

<!-- Tour Results -->
<section class="tour-section section-padding fix">
    <div class="container custom-container">
        <div class="tour-destination-wrapper row">
            <?php
            $meta_query = [];

            if ($selected_destination) {
                $meta_query[] = [
                    'key' => 'location',
                    'value' => $selected_destination,
                    'compare' => '='
                ];
            }

            $args = [
                'post_type' => 'tour',
                'posts_per_page' => -1,
                'meta_query' => $meta_query
            ];

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()): $query->the_post();
                    $loc = get_field('location');
                    $days = get_field('days');
                    $peoples = get_field('peoples');
                    $price = get_field('price');
            ?>
                <div class="col-md-4">
                    <div class="destination-card-items mt-0 tour-design">
                        <div class="destination-image">
                            <?php if(has_post_thumbnail()): the_post_thumbnail('full', ['alt'=>get_the_title()]);
                            else: ?>
                                <img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/news/default.jpg'); ?>" alt="default">
                            <?php endif; ?>
                        </div>
                        <div class="destination-content">
                            <ul class="meta">
                                <li><i class="fa-regular fa-location-dot"></i> <?php echo esc_html($loc); ?></li>
                            </ul>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <ul class="info">
                                <li><i class="fa-regular fa-clock"></i> <?php echo esc_html($days); ?></li>
                                <li><i class="fa-regular fa-users"></i> <?php echo esc_html($peoples); ?></li>
                            </ul>
                            <div class="price">
                                <h6>৳<?php echo esc_html($price); ?></h6>
                                <a href="<?php the_permalink(); ?>" class="theme-btn style-2">View Details <i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No tours found for this country.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
