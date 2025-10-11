<?php
/**
 * Archive template for B2B Packages & B2B Visas
 */
get_header();

// Redirect guests to login
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url('/login/') );
    exit;
}

// Determine current post type
$post_type = get_query_var('post_type');

// Set page title, taxonomy, and ACF fields based on CPT
if ($post_type === 'b2b-package') {
    $page_title = 'B2B Packages';
    $taxonomy   = 'b2b_package_category';
    $fields = [
        'code'    => 'b2b_package_code',
        'city'    => 'b2b_package_city',
        'country' => 'b2b_package_country',
        'day'     => 'b2b_package_day',
        'night'   => 'b2b_package_night',
        'pax'     => 'b2b_package_pax',
    ];
} elseif ($post_type === 'b2b-visa') {
    $page_title = 'B2B Visas';
    $taxonomy   = 'b2b_visa_category';
    $fields = [
        'code'    => 'visa_code',
        'city'    => 'visa_city',
        'country' => 'visa_country',
        'day'     => 'visa_duration',
        'night'   => '', // Visas don’t have nights
        'pax'     => 'visa_price_table',
    ];
} else {
    $page_title = 'Items';
    $taxonomy   = '';
    $fields = [];
}
?>

<!-- breadcrumb-wrapper Section Start -->
<section class="breadcrumb-wrapper fix bg-cover"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/breadcrumb.jpg);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2><?php echo esc_html($page_title); ?></h2>
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
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        $code    = get_field($fields['code']);
        $city    = get_field($fields['city']);
        $country = get_field($fields['country']);
        $day     = get_field($fields['day']);
        $night   = $fields['night'] ? get_field($fields['night']) : '';
        $pax     = get_field($fields['pax']);
?>
<div class="col-md-6 col-lg-4">
    <div class="card-body-b2b">
        <h3><?php the_title(); ?></h3>
        <div class="mb-2 text-center">
            <strong><?php echo esc_html($code); ?></strong>
            <?php if($city): ?><p class="text-muted mb-0"><?php echo esc_html($city); ?></p><?php endif; ?>
            <?php if($country): ?><p class="text-muted mb-0"><?php echo esc_html($country); ?></p><?php endif; ?>
            <?php if($day): ?>
                <span class="text-muted">
                    Duration: <?php echo esc_html($day); ?>
                    <?php if($night) echo ' / '.esc_html($night).' Nights'; ?>
                </span>
            <?php endif; ?>
        </div>

        <?php if( !empty($pax) && is_array($pax) ): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="py-1">Pax Qnt</th>
                        <th class="py-1 text-end">Per Person Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($pax as $row): ?>
                    <tr>
                        <td class="py-1"><?php echo esc_html($row['b2b_package_pax_number'] ?? $row['pax']); ?></td>
                        <td class="py-1 text-end"><?php echo esc_html($row['b2b_package_pax_amount'] ?? $row['price']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <div class="text-center"><a href="<?php the_permalink();?>">Click for details</a></div>
    </div>
</div>

<?php
    endwhile;

    the_posts_pagination([
        'mid_size'  => 2,
        'prev_text' => '<i class="fal fa-long-arrow-left"></i>',
        'next_text' => '<i class="fal fa-long-arrow-right"></i>',
    ]);
else :
    echo '<p>No items found.</p>';
endif;
?>

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="main-sideber">
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4><?php echo esc_html($page_title); ?> Categories</h4></div>
                            <div class="news-widget-categories visa-contact">
                                <ul>
<?php
if ($taxonomy) {
    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => true,
    ]);
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $term_link = get_term_link($term);
            echo '<li><i class="fa-regular fa-folder"></i> ';
            echo '<a href="'.esc_url($term_link).'">'.esc_html($term->name).'</a>';
            echo ' ('.intval($term->count).')</li>';
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
                
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
