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
$b2b_package_code     = get_field('b2b_package_code');
        $b2b_package_city     = get_field('b2b_package_city');
        $b2b_package_country     = get_field('b2b_package_country');
        $b2b_package_day     = get_field('b2b_package_day');
        $b2b_package_night     = get_field('b2b_package_night');
        $b2b_package_pax     = get_field('b2b_package_pax');
        $b2b_package_tour_details     = get_field('b2b_package_tour_details');
?>

<section class="activities-details-section fix section-padding">
    <div class="container">
        <div class="activities-details-wrapper">
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card-body-b2b">
                    <h3><?php the_title(); ?></h3>
                    <div class="mb-2 text-center">
                        <strong><?php echo $b2b_package_code;?></strong>
                        <p class="text-muted mb-0"><?php echo $b2b_package_country; ?></p>
                        <p class="text-muted mb-0"><?php echo $b2b_package_city; ?></p>
                        <span class="text-muted">Duration: <?php echo $b2b_package_day; ?> Days / <?php echo $b2b_package_night; ?> Nights </span>
                    </div>
                </div>
                <br><br><br>
                <div class="car-b2b-details">
                    <?php echo $b2b_package_tour_details;?>
                </div>
                </div>

                <!-- Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="main-sideber">

                        <!-- Contact Widget -->
                        <div class="single-sidebar-widget">
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
                        </div>

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
