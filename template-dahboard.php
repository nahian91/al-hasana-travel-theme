<?php
/*
Template Name: Dashboard
*/
get_header();

// Redirect guests
if ( ! is_user_logged_in() ) {
    wp_redirect(home_url('/login/'));
    exit;
}

$current_user = wp_get_current_user();

// Get selected filters
$package_cat = !empty($_GET['package_cat']) ? sanitize_text_field($_GET['package_cat']) : '';
$duration    = !empty($_GET['duration']) ? sanitize_text_field($_GET['duration']) : '';
$visa_cat    = !empty($_GET['visa_cat']) ? sanitize_text_field($_GET['visa_cat']) : '';

// Determine active tab
$active_tab = 'packages';
if($visa_cat){
    $active_tab = 'visa';
}
?>
<!-- Breadcrumb -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/breadcrumb.jpg);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
</section>

<section class="hero-section-2">
<div class="hero-2">
<div class="container custom-container-3">
<div class="row">
<div class="col-lg-8">
<div class="best-price-section b2b-dashboard mb-0">
<div class="hero-bottom">
<div class="best-price-wrapper">
    <ul class="nav">
        <li class="nav-item">
            <a href="#packages" data-bs-toggle="tab" class="nav-link <?php echo ($active_tab=='packages') ? 'active' : ''; ?>">
                <i class="fa-regular fa-paper-plane"></i> Packages
            </a>
        </li>
        <li class="nav-item">
            <a href="#visa" data-bs-toggle="tab" class="nav-link <?php echo ($active_tab=='visa') ? 'active' : ''; ?>">
                <i class="fa-regular fa-map"></i> Visa
            </a>
        </li>
    </ul>
</div>

<div class="tab-content mt-3">

<!-- PACKAGES Tab -->
<div id="packages" class="tab-pane fade <?php echo ($active_tab=='packages') ? 'show active' : ''; ?>">
    <div class="comment-form-wrap gtamca-form mb-3">
        <form method="GET">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-clt">
                        <span>All Countries</span>
                        <select name="package_cat" class="nice-select w-100">
                            <option value="">Select Country</option>
                            <?php
                            $categories = get_terms(['taxonomy' => 'b2b_package_category','hide_empty'=>true]);
                            if(!empty($categories) && !is_wp_error($categories)){
                                foreach($categories as $cat){
                                    $selected = ($package_cat == $cat->slug) ? 'selected' : '';
                                    echo '<option value="'.esc_attr($cat->slug).'" '.$selected.'>'.esc_html($cat->name).'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-clt">
                        <span>All Durations</span>
                        <select name="duration" class="nice-select w-100">
                            <option value="">Select Duration</option>
                            <?php
                            $packages = get_posts(['post_type'=>'b2b-package','posts_per_page'=>-1]);
                            $durations = [];
                            foreach($packages as $p){
                                $d = get_field('b2b_package_day',$p->ID).' Days / '.get_field('b2b_package_night',$p->ID).' Nights';
                                if(!in_array($d,$durations)){
                                    $durations[] = $d;
                                    $selected = ($duration==$d)?'selected':'';
                                    echo '<option value="'.esc_attr($d).'" '.$selected.'>'.esc_html($d).'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-3"><button type="submit" class="theme-btn w-100">Search</button></div>
            </div>
        </form>
    </div>

    <!-- Packages Results -->
    <?php if($package_cat || $duration): ?>
    <div class="row">
        <?php
        $args = ['post_type'=>'b2b-package','posts_per_page'=>-1,'post_status'=>'publish'];
        $tax_query=[];
        if($package_cat){
            $tax_query[]=['taxonomy'=>'b2b_package_category','field'=>'slug','terms'=>$package_cat];
        }
        if(!empty($tax_query)) $args['tax_query']=$tax_query;
        if($duration){
            $args['meta_query']=[['key'=>'b2b_package_day','value'=>intval(explode(' ',$duration)[0]),'compare'=>'=','type'=>'NUMERIC']];
        }
        $packages=get_posts($args);
        if($packages):
            foreach($packages as $post): setup_postdata($post);
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
                <div class="mb-2 text-center">
                    <strong><?php echo $b2b_package_code;?></strong>
                    <p class="text-muted mb-0"><?php echo $b2b_package_country; ?></p>
                    <p class="text-muted mb-0"><?php echo $b2b_package_city; ?></p>
                    <span class="text-muted">Duration: <?php echo $b2b_package_day; ?> Days / <?php echo $b2b_package_night; ?> Nights </span>
                </div>
            </div>
        </div>
        <?php endforeach; wp_reset_postdata(); else: echo '<p>No packages found.</p>'; endif; ?>
    </div>
    <?php endif; ?>
</div>

<!-- VISA Tab -->
<div id="visa" class="tab-pane fade <?php echo ($active_tab=='visa') ? 'show active' : ''; ?>">
    <div class="comment-form-wrap mb-3">
        <form method="GET">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-clt">
                        <span>All Countries</span>
                        <select name="visa_cat" class="nice-select w-100">
                            <option value="">Select Country</option>
                            <?php
                            $visa_cats = get_terms(['taxonomy'=>'b2b_visa_category','hide_empty'=>true]);
                            if(!empty($visa_cats) && !is_wp_error($visa_cats)){
                                foreach($visa_cats as $vc){
                                    $selected = ($visa_cat==$vc->slug)?'selected':'';
                                    echo '<option value="'.esc_attr($vc->slug).'" '.$selected.'>'.esc_html($vc->name).'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-3"><button type="submit" class="theme-btn w-100">Search</button></div>
            </div>
        </form>
    </div>

    <!-- Visa Results -->
    <?php if($visa_cat): ?>
    <div class="row">
        <?php
        $args = ['post_type'=>'b2b-visa','posts_per_page'=>-1,'post_status'=>'publish'];
        if($visa_cat){
            $args['tax_query']=[['taxonomy'=>'b2b_visa_category','field'=>'slug','terms'=>$visa_cat]];
        }
        $visas = get_posts($args);
        if($visas):
            foreach($visas as $post): setup_postdata($post);
                $visa_country = get_field('b2b_visa_country');
        ?>
        <div class="col-md-6 col-lg-4">
            <div class="card-body-b2b">
                <h3><?php the_title(); ?></h3>
                <p class="text-muted mb-0"><?php echo $visa_country; ?></p>
                <div class="text-center"><a href="<?php the_permalink();?>">Click for details</a></div>
            </div>
        </div>
        <?php endforeach; wp_reset_postdata(); else: echo '<p>No visas found.</p>'; endif; ?>
    </div>
    <?php endif; ?>
</div>

</div> <!-- /.tab-content -->
</div>
</div>
</div>

<div class="col-12 col-lg-4">
                    <div class="main-sideber">

                        <!-- Contact Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4>Visa Packages</h4></div>
                            <div class="news-widget-categories visa-contact">
                                <ul>
<?php
// Taxonomy for B2B Packages
$taxonomy = 'b2b_visa_category';

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
