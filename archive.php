<?php
/**
 * Dynamic Archive Template for B2B Packages & B2B Visas
 */

get_header();

// Redirect guests to login
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url('/login/') );
    exit;
}

// Initialize variables
$post_type   = get_query_var('post_type');
$taxonomy    = '';
$page_title  = 'Items';
$term_slug   = '';

// Detect taxonomy archives first
if ( is_tax('b2b_package_category') ) {
    $taxonomy   = 'b2b_package_category';
    $post_type  = 'b2b-package';
    $term       = get_queried_object();
    $term_slug  = $term->slug;
    $page_title = $term->name;
} elseif ( is_tax('b2b_visa_category') ) {
    $taxonomy   = 'b2b_visa_category';
    $post_type  = 'b2b-visa';
    $term       = get_queried_object();
    $term_slug  = $term->slug;
    $page_title = $term->name;
} else {
    // Regular CPT archive
    if ( $post_type === 'b2b-package' ) {
        $taxonomy   = 'b2b_package_category';
        $page_title = 'B2B Packages';
    } elseif ( $post_type === 'b2b-visa' ) {
        $taxonomy   = 'b2b_visa_category';
        $page_title = 'B2B Visas';
    }
}

// Pagination
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

// WP_Query arguments
$args = array(
    'post_type'      => $post_type,
    'posts_per_page' => 9,
    'paged'          => $paged,
);

// Filter by taxonomy term if on a term archive
if ( $taxonomy && $term_slug ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => $term_slug,
        ),
    );
}

$query = new WP_Query($args);
?>

<!-- Breadcrumb -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/breadcrumb.jpg);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2><?php echo esc_html($page_title); ?></h2>
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

<section class="activities-details-section fix section-padding">
    <div class="container">
        <div class="activities-details-wrapper">
            <div class="row g-4 justify-content-center">

                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="row">
<?php
if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();

        // Get custom fields (for packages)
        $b2b_package_code    = get_field('b2b_package_code');
        $b2b_package_city    = get_field('b2b_package_city');
        $b2b_package_country = get_field('b2b_package_country');
        $b2b_package_day     = get_field('b2b_package_day');
        $b2b_package_night   = get_field('b2b_package_night');
        $b2b_package_pax     = get_field('b2b_package_pax');
?>
        <div class="col-md-6 col-lg-4">
            <div class="card-body-b2b">
                <h3><?php the_title(); ?></h3>

<?php if ( $post_type === 'b2b-package' ) : ?>
                <div class="mb-2 text-center">
                    <strong><?php echo esc_html($b2b_package_code); ?></strong>
                    <p class="text-muted mb-0"><?php echo esc_html($b2b_package_country); ?></p>
                    <p class="text-muted mb-0"><?php echo esc_html($b2b_package_city); ?></p>
                    <span class="text-muted">Duration: <?php echo esc_html($b2b_package_day); ?> Days / <?php echo esc_html($b2b_package_night); ?> Nights</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="py-1">Pax Qnt</th>
                                <th class="py-1 text-end">Per Person Price</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
        if ( $b2b_package_pax ) {
            foreach ( $b2b_package_pax as $pax ) {
                echo '<tr>';
                echo '<td class="py-1">' . esc_html($pax['b2b_package_pax_number']) . '</td>';
                echo '<td class="py-1 text-end">' . esc_html($pax['b2b_package_pax_amount']) . '</td>';
                echo '</tr>';
            }
        }
?>
                        </tbody>
                    </table>
                </div>
<?php endif; ?>

                <div class="text-center"><a href="<?php the_permalink(); ?>">Click for details</a></div>
            </div>
        </div>
<?php
    endwhile;

    // Pagination
    echo '<div class="col-12">';
    the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => '<i class="fal fa-long-arrow-left"></i>',
        'next_text' => '<i class="fal fa-long-arrow-right"></i>',
    ));
    echo '</div>';

else :
    echo '<p>No items found.</p>';
endif;

wp_reset_postdata();
?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="main-sideber">
                        <div class="single-sidebar-widget">
                            <div class="news-widget-categories visa-contact">
                                <ul>
<?php
if ( $taxonomy ) {
    $terms = get_terms(array(
        'taxonomy'   => $taxonomy,
        'hide_empty' => true,
    ));

    if ( ! empty($terms ) && ! is_wp_error($terms) ) {
        foreach ( $terms as $term_item ) {
            $term_link = get_term_link($term_item);
            echo '<li><i class="fa-regular fa-folder"></i> ';
            echo '<a href="' . esc_url($term_link) . '">' . esc_html($term_item->name) . '</a>';
            echo ' (' . intval($term_item->count) . ')';
            echo '</li>';
        }
    } else {
        echo '<li>No categories found.</li>';
    }
}
?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar -->

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
