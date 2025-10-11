<?php
/*
Template Name: Dashboard
*/
get_header();

// Redirect guests to login page
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url('/login/') );
    exit;
}

$current_user = wp_get_current_user();
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
                <div class="col-lg-8 mx-auto">
                    <div class="best-price-section b2b-dashboard mb-0">
                        <div class="hero-bottom">
                            <div class="best-price-wrapper">
                                <!-- Tabs Nav -->
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="#packages" data-bs-toggle="tab" class="nav-link active">
                                            <i class="fa-regular fa-paper-plane"></i> Packages
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#visa" data-bs-toggle="tab" class="nav-link">
                                            <i class="fa-regular fa-map"></i> Visa
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content mt-3">

                                <!-- PACKAGES Form -->
                                <div id="packages" class="tab-pane fade show active">
                                    <div class="comment-form-wrap gtamca-form mb-3">
                                        <form action="<?php echo get_post_type_archive_link('b2b-package'); ?>" method="GET">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-clt">
                                                        <span>All Countries</span>
                                                        <select name="package_cat" class="nice-select w-100">
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            $categories = get_terms([
                                                                'taxonomy' => 'b2b_package_category',
                                                                'hide_empty' => true,
                                                            ]);
                                                            if(!empty($categories) && !is_wp_error($categories)){
                                                                foreach($categories as $cat){
                                                                    echo '<option value="'.esc_attr($cat->slug).'">'.esc_html($cat->name).'</option>';
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
                                                                    echo '<option value="'.esc_attr($d).'">'.esc_html($d).'</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <button type="submit" class="theme-btn w-100">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- /.packages form -->

                                <!-- VISA Form -->
                                <div id="visa" class="tab-pane fade">
                                    <div class="comment-form-wrap mb-3">
                                        <form action="<?php echo get_post_type_archive_link('b2b-visa'); ?>" method="GET">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-clt">
                                                        <span>All Countries</span>
                                                        <select name="visa_cat" class="nice-select w-100">
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            $visa_cats = get_terms([
                                                                'taxonomy'=>'b2b_visa_category',
                                                                'hide_empty'=>true
                                                            ]);
                                                            if(!empty($visa_cats) && !is_wp_error($visa_cats)){
                                                                foreach($visa_cats as $vc){
                                                                    echo '<option value="'.esc_attr($vc->slug).'">'.esc_html($vc->name).'</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <button type="submit" class="theme-btn w-100">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- /.visa form -->

                            </div> <!-- /.tab-content -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
