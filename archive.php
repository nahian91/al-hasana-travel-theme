<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alhasanatheme
 */

get_header();
?>

 <!-- breadcrumb-wrappe-Section Start -->
        <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/breadcrumb/breadcrumb.jpg);">
            <div class="container">
                <div class="row">
                    <div class="page-heading">
                        <h2><?php echo single_cat_title();?></h2>
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="<?php echo site_url();?>">Home</a>
                            </li>
                            <li><i class="fa-regular fa-chevrons-right"></i></li>
                            <li><?php echo single_cat_title();?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

		<section class="news-section section-padding fix">
    <div class="container">
        <div class="row g-4">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 6, // Number of posts per page
                'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
            );
            $loop = new WP_Query($args);

            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
            ?>
                <div class="col-xl-4 col-md-6 col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-card-items-3 mt-0">
                        <div class="news-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="news-content">
                            <ul class="post-meta">
                                <li class="post"><?php echo get_the_date('d'); ?><span><?php echo get_the_date('M'); ?></span></li>
                                <li>
                                    <i class="fa-regular fa-user"></i>
                                    By <?php the_author(); ?>
                                </li>
                                <li>
                                    <i class="fa-regular fa-tag"></i>
                                    <?php the_category(', '); ?>
                                </li>
                            </ul>
                            <h4>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>
							<?php the_excerpt();?>
                            <a href="<?php the_permalink(); ?>" class="link-btn">Read More <i class="fa-sharp fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="page-nav-wrap text-center">
            <?php
            echo paginate_links(array(
                'total'   => $loop->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'prev_text' => '<i class="fal fa-long-arrow-left"></i>',
                'next_text' => '<i class="fal fa-long-arrow-right"></i>',
            ));
            ?>
        </div>

        <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</section>	

<?php
get_footer();
