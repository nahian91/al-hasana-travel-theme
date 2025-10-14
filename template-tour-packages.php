<?php
/*
Template Name: Tour Packages by Category
*/

get_header();

// Get selected tour category for this page
$selected_cat = get_post_meta(get_the_ID(), '_tour_category', true);

// Get filter values from GET
$selected_destination  = isset($_GET['destination']) ? (array) $_GET['destination'] : [];
$selected_trip_types   = isset($_GET['trip_types']) ? (array) $_GET['trip_types'] : [];
$selected_difficulties = isset($_GET['difficulties']) ? (array) $_GET['difficulties'] : [];
$selected_activities   = isset($_GET['activities']) ? (array) $_GET['activities'] : [];
$selected_duration     = isset($_GET['duration']) ? sanitize_text_field($_GET['duration']) : '';
$selected_price        = isset($_GET['price']) ? intval($_GET['price']) : 100000;
$selected_people       = isset($_GET['people']) ? intval($_GET['people']) : '';
?>

<!-- Breadcrumb -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/assets/img/breadcrumb/breadcrumb.jpg'); ?>);">
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

<!-- Tour Section -->
<section class="tour-section section-padding fix">
    <div class="container custom-container">
        <div class="tour-destination-wrapper">
            <div class="row">

                <!-- Sidebar Filters -->
                <div class="col-md-4">
                    <div class="tour-filter-sidebar">
                        <h4>Filter Tours</h4>
                        <form method="get" action="">

                            <?php
                            // Get all tour posts in selected category
                            $args_all_tours = [
                                'post_type' => 'tour',
                                'posts_per_page' => -1,
                            ];
                            if($selected_cat){
                                $args_all_tours['tax_query'] = [
                                    [
                                        'taxonomy' => 'tour_category',
                                        'field'    => 'slug',
                                        'terms'    => $selected_cat,
                                    ]
                                ];
                            }
                            $all_tours = get_posts($args_all_tours);

                            // Checkbox rendering function
                            function render_checkbox_group($title, $name, $options, $selected){
                                if(empty($options)) return;
                                echo '<div class="filter-group">';
                                echo "<h6>$title</h6>";
                                echo '<div class="checkbox-wrapper">';
                                foreach($options as $opt){
                                    $checked = in_array($opt, $selected) ? 'checked' : '';
                                    $id = sanitize_title($name . '-' . $opt);
                                    echo '<div class="form-check">';
                                    echo '<input type="checkbox" name="'.esc_attr($name).'[]" value="'.esc_attr($opt).'" id="'.esc_attr($id).'" '.$checked.'>';
                                    echo '<label for="'.esc_attr($id).'">'.esc_html($opt).'</label>';
                                    echo '</div>';
                                }
                                echo '</div></div>';
                            }

                            // Destination
                            $locations = [];
                            foreach($all_tours as $tour_id){
                                $loc = get_field('location', $tour_id);
                                if($loc) $locations[] = $loc;
                            }
                            $locations = array_unique($locations);
                            sort($locations);
                            render_checkbox_group('Destination','destination',$locations,$selected_destination);

                            // Trip Types
                            $trip_types_arr = [];
                            foreach($all_tours as $tour_id){
                                $vals = get_field('trip_types', $tour_id);
                                if($vals){
                                    if(is_array($vals)) $trip_types_arr = array_merge($trip_types_arr, $vals);
                                    else $trip_types_arr[] = $vals;
                                }
                            }
                            $trip_types_arr = array_unique($trip_types_arr);
                            sort($trip_types_arr);
                            render_checkbox_group('Trip Types','trip_types',$trip_types_arr,$selected_trip_types);

                            // Difficulties
                            $difficulties_arr = [];
                            foreach($all_tours as $tour_id){
                                $vals = get_field('difficulties', $tour_id);
                                if($vals){
                                    if(is_array($vals)) $difficulties_arr = array_merge($difficulties_arr, $vals);
                                    else $difficulties_arr[] = $vals;
                                }
                            }
                            $difficulties_arr = array_unique($difficulties_arr);
                            sort($difficulties_arr);
                            render_checkbox_group('Difficulties','difficulties',$difficulties_arr,$selected_difficulties);

                            // Activities
                            $activities_arr = [];
                            foreach($all_tours as $tour_id){
                                $vals = get_field('activities', $tour_id);
                                if($vals){
                                    if(is_array($vals)) $activities_arr = array_merge($activities_arr, $vals);
                                    else $activities_arr[] = $vals;
                                }
                            }
                            $activities_arr = array_unique($activities_arr);
                            sort($activities_arr);
                            render_checkbox_group('Activities','activities',$activities_arr,$selected_activities);
                            ?>

                            <!-- Duration -->
                            <div class="filter-group">
                                <h6>Duration</h6>
                                <select name="duration" class="form-control">
                                    <option value="">All Durations</option>
                                    <option value="1-3" <?php selected($selected_duration,'1-3'); ?>>1–3 Days</option>
                                    <option value="4-7" <?php selected($selected_duration,'4-7'); ?>>4–7 Days</option>
                                    <option value="8-14" <?php selected($selected_duration,'8-14'); ?>>8–14 Days</option>
                                    <option value="15+" <?php selected($selected_duration,'15+'); ?>>15+ Days</option>
                                </select>
                            </div>

                            <!-- Price -->
                            <div class="filter-group">
                                <h6>Max Price</h6>
                                <input type="range" name="price" min="1000" max="100000" step="1000" value="<?php echo esc_attr($selected_price); ?>" class="form-range" id="filter-price">
                                <div class="price-value">Up to ৳<span id="price-display"><?php echo esc_html($selected_price); ?></span></div>
                            </div>

                            <!-- People -->
                            <div class="filter-group">
                                <h6>Number of People</h6>
                                <input type="number" name="people" min="1" class="form-control" value="<?php echo esc_attr($selected_people); ?>">
                            </div>

                            <!-- Apply Button -->
                            <div class="filter-action">
                                <button type="submit" class="theme-btn style-2 w-100">Apply Filters</button>
                            </div>

                        </form>
                    </div>
                </div>

                <!-- Tour Results -->
                <div class="col-md-8">
                    <?php
                    $meta_query = ['relation'=>'AND'];

                    if($selected_destination){
                        $meta_query[] = ['key'=>'location','value'=>$selected_destination,'compare'=>'IN'];
                    }
                    if($selected_trip_types){
                        $meta_query[] = ['key'=>'trip_types','value'=>$selected_trip_types,'compare'=>'IN'];
                    }
                    if($selected_difficulties){
                        $meta_query[] = ['key'=>'difficulties','value'=>$selected_difficulties,'compare'=>'IN'];
                    }
                    if($selected_activities){
                        $meta_query[] = ['key'=>'activities','value'=>$selected_activities,'compare'=>'IN'];
                    }
                    if($selected_price){
                        $meta_query[] = ['key'=>'price','value'=>$selected_price,'compare'=>'<=','type'=>'NUMERIC'];
                    }
                    if($selected_duration){
                        if($selected_duration=='1-3') $meta_query[] = ['key'=>'days','value'=>[1,3],'compare'=>'BETWEEN','type'=>'NUMERIC'];
                        elseif($selected_duration=='4-7') $meta_query[] = ['key'=>'days','value'=>[4,7],'compare'=>'BETWEEN','type'=>'NUMERIC'];
                        elseif($selected_duration=='8-14') $meta_query[] = ['key'=>'days','value'=>[8,14],'compare'=>'BETWEEN','type'=>'NUMERIC'];
                        elseif($selected_duration=='15+') $meta_query[] = ['key'=>'days','value'=>15,'compare'=>'>=','type'=>'NUMERIC'];
                    }
                    if($selected_people){
                        $meta_query[] = ['key'=>'peoples','value'=>$selected_people,'compare'=>'>=','type'=>'NUMERIC'];
                    }

                    // Query tours by selected category
                    $args = [
                        'post_type' => 'tour',
                        'posts_per_page' => -1,
                        'meta_query' => $meta_query,
                    ];

                    if($selected_cat){
                        $args['tax_query'] = [
                            [
                                'taxonomy' => 'tour_category',
                                'field'    => 'slug',
                                'terms'    => $selected_cat,
                            ]
                        ];
                    }

                    $tours = new WP_Query($args);

                    if($tours->have_posts()):
                        while($tours->have_posts()): $tours->the_post();
                            $loc = get_field('location');
                            $days = get_field('days');
                            $peoples = get_field('peoples');
                            $price = get_field('price');
                    ?>
                            <div class="destination-card-items mt-0">
                                <div class="destination-image">
                                    <?php if(has_post_thumbnail()): the_post_thumbnail('full',['alt'=>get_the_title()]); 
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
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo '<p>No tours found.</p>';
                    endif;
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.filter-group { margin-bottom: 20px; }
.checkbox-wrapper { max-height: 180px; overflow-y: auto; padding: 10px; border: 1px solid #eee; border-radius: 5px; }
.checkbox-wrapper .form-check { display: flex; gap: 10px; margin-bottom: 5px; }
</style>

<script>
document.getElementById('filter-price').addEventListener('input', function(){
    document.getElementById('price-display').textContent = this.value;
});
</script>

<?php get_footer(); ?>
