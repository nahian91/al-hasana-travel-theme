<?php
/*
Template Name: Visa Services
*/

get_header();
?>
        
        <!-- breadcrumb-wrappe-Section Start -->
        <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/breadcrumb/breadcrumb-6.jpg);">
            <div class="container">
                <div class="row">
                    <div class="page-heading">
                        <h2><?php the_title();?></h2>
                    </div>
                </div>
            </div>
        </section>

        <!-- destination-details Section Start -->
        <section class="destination-details-section fix section-padding">
            <div class="container">
                <div class="destination-details-wrapper">
                    <div class="row g-4">

    <?php
    $visa_category = get_terms(array(
        'taxonomy'   => 'visa-category',
        'hide_empty' => false,
    ));

    if ( ! empty( $visa_category ) && ! is_wp_error( $visa_category ) ) {
        foreach ( $visa_category as $visa_cat ) {
            ?>
            <div class="visa-services-section-title text-center">
                <h2><?php echo esc_html( $visa_cat->name ); ?></h2>
            </div>

            <?php 
            $args = array(
                'post_type'      => 'visa-service',
                'posts_per_page' => -1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'visa-category',
                        'field'    => 'term_id',
                        'terms'    => $visa_cat->term_id,
                    ),
                ),
            );
            $countries = new WP_Query( $args );
            ?>

            <div class="row visa-services-row">
                <?php 
                if ( $countries->have_posts() ) {
                    while ( $countries->have_posts() ) {
                        $countries->the_post();
                        ?>
                        <div class="col-md-3">
                            <div class="activities-items visa-services-box">
                                <div class="activities-image">
                                    <?php 
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'medium', ['alt' => get_the_title()] );
                                    } else {
                                        echo '<img src="' . get_template_directory_uri() . '/assets/img/activities/default.jpg" alt="img">';
                                    }
                                    ?>
                                </div>
                                <div class="activities-content">
                                    <h4>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <?php 
        }
    }
    ?>

                    </div>
                </div>
            </div>
        </section>

        <section class="visa-services-info-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="visa-services-info">
                            <h4>Visa Service in Bangladesh – Al Hasana Travels & Tours</h4>
                            <div class="single-visa-service-info">
                                <h5>Best Visa Processing Agency in Bangladesh</h5>
                                <p>Looking for a trusted visa service in Bangladesh? At Al Hasana Travels & Tours, we provide professional and reliable visa processing solutions for tourists, students, workers, and patients. As a leading visa processing agency in Bangladesh, we simplify complex paperwork and ensure smooth approval for your chosen destination.</p>
                            </div>
                            <div class="single-visa-service-info">
                                <h5>Why Choose Al Hasana Travels & Tours for Visa Processing?</h5>
                                <p>Visa applications often feel overwhelming due to strict embassy rules and complex documentation. At Al Hasana Travels, our experts handle every step with care to minimize stress and maximize approval rates.</p>
                                <ul>
                                    <li>Professional Visa Consultancy in Sylhet – Expert guidance at every stage</li>
                                    <li>High Visa Approval Rate – Years of proven experience</li>
                                    <li>Hassle-Free Service – We handle the paperwork for you</li>
                                    <li>All Visa Categories – Tourist, student, work, and medical visas</li>
                                </ul>
                            </div>
                            <div class="single-visa-service-info">
                                <h5>Our Visa Services in Bangladesh</h5>
                                <ul>
                                    <li>Tourist Visa from Bangladesh – Support for destinations like Turkey, Malaysia, Thailand, Singapore, and UAE, along with custom travel packages.</li>
                                    <li>Work & Residency Visa Bangladesh – Visa assistance for Saudi Arabia, UAE, Oman, and Qatar, plus Umrah visa processing.</li>
                                    <li>Student Visa Bangladesh – Guidance for studying abroad in Canada, USA, UK, and Australia with full document preparation.</li>
                                    <li>Medical Visa Bangladesh – Priority processing for patients seeking treatment abroad in India, Singapore, or Thailand.</li>
                                </ul>
                            </div>
                            <div class="single-visa-service-info">
                                <h5>Why We Are the Best Visa Agency in Bangladesh</h5>
                                <ul>
                                    <li>Strong embassy and high commission networks</li>
                                    <li>Complete visa documentation support</li>
                                    <li>Fast, accurate processing</li>
                                    <li>Trusted by thousands of Bangladeshi travelers</li>
                                </ul>
                            </div>
                            <div class="single-visa-service-info">
                                <h5>Al Hasana Travels – Your Reliable Visa Consultancy in Sylhet</h5>
                                <p>If you are searching for a visa consultancy in Dhaka that guarantees professionalism and success, Al Hasana Travels & Tours is your trusted partner. Whether your purpose is tourism, study, work, or medical treatment, we ensure your visa process is smooth and stress-free.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <?php get_footer();?>