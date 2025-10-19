<?php
/*
Template Name: B2B Package
*/
get_header();

$page_banner = get_field('page_banner');

// Redirect guests to login
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url('/login/') );
    exit;
}

$current_user = wp_get_current_user();
?>

<!-- breadcrumb-wrapper Section Start -->
<section class="breadcrumb-wrapper fix bg-cover"
    style="background-image: url(<?php echo $page_banner;?>);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2>All Packages</h2>
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
                <div class="col-lg-8">
                    <div class="row">
<?php
$args = array(
    'post_type'      => 'b2b-package',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
);

$visas = get_posts($args);

if ( $visas ) :
    foreach ( $visas as $post ) :
        setup_postdata($post);

        $b2b_package_code     = get_field('b2b_package_code');
        $b2b_package_city     = get_field('b2b_package_city');
        $b2b_package_country     = get_field('b2b_package_country');
        $b2b_package_day     = get_field('b2b_package_day');
        $b2b_package_night     = get_field('b2b_package_night');
        $b2b_package_pax     = get_field('b2b_package_pax');
        $b2b_package_tour_details     = get_field('b2b_package_tour_details');
        ?>
        <div class="col-md-6 col-lg-4">
                <div class="card-body-b2b">
                    <h3><?php the_title(); ?></h3>
                    <div class="mb-2 text-center">
                        <strong><?php echo $b2b_package_code;?></strong>
                        <p class="text-muted mb-0"><?php echo $b2b_package_country; ?></p>
                        <p class="text-muted mb-0"><?php echo $b2b_package_city; ?></p>
                        <span class="text-muted">Duration: <?php echo $b2b_package_day; ?> Days / <?php echo $b2b_package_night; ?> Nights </span>
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
                                    foreach($b2b_package_pax as $pax) {
                                        ?>
                                    <tr>
                                        <td class="py-1"><?php echo $pax['b2b_package_pax_number'];?></td>
                                        <td class="py-1 text-end"><?php echo $pax['b2b_package_pax_amount'];?></td>
                                    </tr>
                                        <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center"><a href="<?php the_permalink();?>">Click for details</a></div>
                </div>
        </div>
    <?php
    endforeach;
    wp_reset_postdata();
else :
    echo '<p>No Visa services found.</p>';
endif;
?>
</div>

                </div>
                <!-- Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="main-sideber">

                        <!-- Contact Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4>Tour Packages</h4></div>
                            <div class="news-widget-categories visa-contact">
                                <ul>
<?php
// Taxonomy for B2B Packages
$taxonomy = 'b2b_package_category';

// Get all terms
$terms = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => true, // set true to show only categories with posts
));

if ( !empty($terms) && !is_wp_error($terms) ) {
    foreach ($terms as $term) {
        $term_link = get_term_link($term);
        echo '<li><i class="fa-regular fa-folder"></i> ';
        echo '<a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a>';
        echo ' (' . intval($term->count) . ')';
        echo '</li>';
    }
} else {
    echo '<li>No categories found.</li>';
}
?>
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
