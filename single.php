<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package alhasanatheme
 */

get_header();
?>

	 <!-- breadcrumb-wrappe-Section Start -->
    <section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/breadcrumb/breadcrumb-3.jpg);">
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
                        <div class="blog-post-details">
    <div class="single-blog-post">
        <div class="post-featured-thumb bg-cover"
            style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
            <div class="post">
                <h3>
                    <?php echo get_the_date('d'); ?>
                    <span><?php echo get_the_date('M'); ?></span>
                </h3>
            </div>
        </div>

        <div class="post-content">
            <ul class="post-list d-flex align-items-center">
                <li>
    <i class="fa-regular fa-user"></i>
    By <?php echo esc_html( get_the_author_meta('display_name', get_post_field('post_author', get_the_ID())) ); ?>
</li>
                <li>
                    <i class="fa-regular fa-tag"></i>
                    <?php the_category(', '); ?>
                </li>
            </ul>

            <h3><?php the_title(); ?></h3>

            <div class="post-text">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <div class="row tag-share-wrap mt-4 mb-5">
        <div class="col-lg-8 col-12">
            <div class="tagcloud">
                <?php the_tags('', ' ', ''); ?>
            </div>
        </div>
        <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
            <div class="social-share">
                <span class="me-3">Share:</span>
                <a href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"><i class="fab fa-twitter"></i></a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.youtube.com"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-sideber">
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Categories</h4>
                                </div>
                                <div class="news-widget-categories">
                                   <ul>
    <?php
    $categories = get_categories(array(
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => true
    ));

    foreach ($categories as $category) : ?>
        <li>
            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                <?php echo esc_html($category->name); ?>
            </a>
            <span><?php echo $category->count; ?></span>
        </li>
    <?php endforeach; ?>
</ul>

                                </div>
                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Recent Post</h4>
                                </div>
                                <div class="recent-post-area">
    <?php
    $recent_posts = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 5, // how many recent posts to show
        'post_status'    => 'publish',
    ));

    if ($recent_posts->have_posts()) :
        while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
            
            <div class="recent-items">
                <div class="recent-thumb">
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
                            <i class="fa-regular fa-calendar-days"></i>
                            <?php echo get_the_date('d M, Y'); ?>
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
    endif;
    ?>
</div>

                            </div>
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Tags</h4>
                                </div>
                                <div class="news-widget-categories">
    <div class="tagcloud">
        <?php
        $tags = get_tags(array(
            'orderby' => 'name',
            'order'   => 'ASC',
        ));

        if ($tags) :
            foreach ($tags as $tag) : ?>
                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                    <?php echo esc_html($tag->name); ?>
                </a>
            <?php endforeach;
        endif;
        ?>
    </div>
</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
get_footer();
