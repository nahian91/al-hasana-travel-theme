<?php include('header.php');?>

    <!-- breadcrumb-wrappe-Section Start -->
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/breadcrumb/breadcrumb.jpg);">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <h2><?php the_title();?></h2>
                    <ul class="breadcrumb-list">
                        <li>
                            <a href="<?php echo site_url();?>">Home</a>
                        </li>
                        <li><i class="fa-regular fa-chevrons-right"></i></li>
                        <li><?php the_title();?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- News-details-Section Start -->
    <section class="news-details fix section-padding">
        <div class="container">
            <div class="news-details-area">
                <div class="row g-5">
                    <div class="col-12 col-lg-8">
                        
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-sideber">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="news-widget-categories visa-contact">
                                    <ul>
                                        <li><i class="fa-regular fa-phone"></i> +88-01945111444</li>
                                        <li><i class="fa-regular fa-envelope"></i>visa@obokash.com</li>
                                        <li><i class="fa-regular fa-location-dot"></i>Tower A (5th Floor/South House), # 13, Bir Uttam Aminul Haque Sarak, Kemal Ataturk Ave, Dhaka 1213</li>  
                                    </ul>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Visa Services</h4>
                                </div>
                                <div class="recent-post-area">
    <?php
    $visa_services = new WP_Query(array(
        'post_type'      => 'visa-service',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
    ));

    if ($visa_services->have_posts()) :
        while ($visa_services->have_posts()) : $visa_services->the_post(); 
        
        ?>
            
            <div class="recent-items">
                <div class="recent-thumb visa-thumb">
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail', ['alt' => get_the_title()]);
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/img/news/default.jpg" alt="default">';
                        }
                        ?>
                    </a>
                </div>
                <div class="recent-content">
                    <ul>
                        <li>
                            Visa
                        </li>
                    </ul>
                    <h6>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h6>
                </div>
            </div>

        <?php endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No visa services found.</p>';
    endif;
    ?>
</div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Tour Packages</h4>
                                </div>
                                <div class="recent-post-area">
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp1.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    14 Feb, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Get Best Advertised Your
                                                    Side Pocket.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp2.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    12 Mar, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Supervisor Disapproved
                                                    of Latest Work.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp3.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    23 Feb, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Sakura dreams and
                                                    samurai tales.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Hajj Packages</h4>
                                </div>
                                <div class="recent-post-area">
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp1.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    14 Feb, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Get Best Advertised Your
                                                    Side Pocket.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp2.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    12 Mar, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Supervisor Disapproved
                                                    of Latest Work.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp3.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    23 Feb, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Sakura dreams and
                                                    samurai tales.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Umrah Packages</h4>
                                </div>
                                <div class="recent-post-area">
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp1.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    14 Feb, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Get Best Advertised Your
                                                    Side Pocket.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp2.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    12 Mar, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Supervisor Disapproved
                                                    of Latest Work.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="assets/img/news/pp3.jpg" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <i class="fa-regular fa-calendar-days"></i>
                                                    23 Feb, 2024
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="news-details.html">
                                                    Sakura dreams and
                                                    samurai tales.
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <?php include ('footer.php');?>