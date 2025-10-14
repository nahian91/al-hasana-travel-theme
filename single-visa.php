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
$post_id = get_the_ID();

// Get submitted form data
$citizen   = isset($_GET['citizen']) ? sanitize_text_field($_GET['citizen']) : '';
$travel_to = isset($_GET['travel_to']) ? sanitize_text_field($_GET['travel_to']) : '';
$category  = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

// Get ACF fields
$visa_name     = get_field('visa_processing_name', $post_id);
$visa_category = get_field('visa_processing_category', $post_id);
$visa_features = get_field('visa_processing_features', $post_id);
$single_visa_processing_fees = get_field('single_visa_processing_fees', $post_id);
$single_visa_processing_services_fees = get_field('single_visa_processing_services_fees', $post_id);
$single_visa_processing_fees_vat = get_field('single_visa_processing_fees_vat', $post_id);
$single_visa_processing_fees_total = get_field('single_visa_processing_fees_total', $post_id);
$multiple_visa_processing_fees = get_field('multiple_visa_processing_fees', $post_id);
$multiple_visa_processing_services_fees = get_field('multiple_visa_processing_services_fees', $post_id);
$multiple_visa_processing_fees_vat = get_field('multiple_visa_processing_fees_vat', $post_id);
$multiple_visa_processing_fees_total = get_field('multiple_visa_processing_fees_total', $post_id);
?>

<section class="activities-details-section fix section-padding">
    <div class="container">
        <div class="activities-details-wrapper">
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-lg-8">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="details-thumb">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="activities-details-content">
                        <h2><?php echo esc_html($visa_name); ?> - <?php echo esc_html($visa_category); ?></h2>

                        <div class="visa-processing-content">
                            <p><strong>Citizen Of:</strong> <?php echo esc_html($citizen); ?></p>
                            <p><strong>Traveling To:</strong> <?php echo esc_html($travel_to); ?></p>
                            <p><strong>Visa Category:</strong> <?php echo esc_html($category); ?></p>
                        </div>

                        <h3>Required Documents / Features:</h3>
                        <?php if (is_array($visa_features)) : ?>
                            <ul class="visa-process-features">
                                <?php foreach ($visa_features as $feature) : 
                                    $name = $feature['visa_processing_features_name'] ?? '';
                                    $desc = $feature['visa_processing_features_description'] ?? '';
                                ?>
                                    <li><strong><?php echo esc_html($name); ?>:</strong> <?php echo esc_html($desc); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p><?php echo esc_html($visa_features); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-12 col-lg-4">
                    <div class="main-sideber">

                        <!-- Book Now Form -->
                        <div class="single-sidebar-widget visa-prces-bok">
                            <div class="best-price-section mb-0 visa-category-page">
                                <div class="hero-bottom">
                                    <div class="row">

                                        <!-- Dynamic Title -->
                                        <div class="wid-title ok-change" id="visaTitle">
                                            <h4>
                                                <span id="visaCategory">
                                                    <?php if ($visa_category) : ?>
                                                        <?php echo esc_html($visa_category); ?>
                                                    <?php endif; ?>
                                                </span>
                                                <br>
                                                <span id="visaPrice">
                                                    <?php if ($single_visa_processing_fees_total) : ?>
                                                        ৳<?php echo esc_html($single_visa_processing_fees_total); ?>
                                                    <?php endif; ?>
                                                </span>
                                            </h4>
                                        </div>

                                        <!-- Tabs -->
                                        <div class="best-price-wrapper">
                                            <ul class="nav">
                                                <li class="nav-item wow fadeInUp" data-wow-delay=".2s">
                                                    <a href="#singleEntry" data-bs-toggle="tab" class="nav-link active"
                                                       data-category="<?php echo esc_html($visa_category); ?>"
                                                       data-price="৳<?php echo esc_html($single_visa_processing_fees_total ?? '20000'); ?>">
                                                        SINGLE ENTRY
                                                    </a>
                                                </li>
                                                <li class="nav-item wow fadeInUp" data-wow-delay=".2s">
                                                    <a href="#multipleEntry" data-bs-toggle="tab" class="nav-link"
                                                       data-category="<?php echo esc_html($visa_category); ?>"
                                                       data-price="৳<?php echo esc_html($multiple_visa_processing_fees_total ?? '25000'); ?>">
                                                        MULTIPLE ENTRY
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Tab Contents -->
                                        <div class="tab-content">

                                            <!-- SINGLE ENTRY -->
                                            <div id="singleEntry" class="tab-pane fade show active">
                                                <br>
                                                <div class="date-picker mb-3">
                                                    <label for="tour-date"><strong>Select Date:</strong></label>
                                                    <input type="date" id="tour-date" name="tour-date" min="<?php echo date('Y-m-d'); ?>" class="form-control" required>
                                                </div>

                                                <table class="fee-table-enhanced">
                                                    <thead>
                                                        <tr>
                                                            <th><i class="fa-regular fa-file-invoice-dollar"></i> Description</th>
                                                            <th><i class="fa-regular fa-money-bill-wave"></i> Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fa-regular fa-passport"></i> Visa Fee</td>
                                                            <td>৳ <?php echo $single_visa_processing_fees;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa-regular fa-hand-holding-dollar"></i> Service Fee</td>
                                                            <td>৳ <?php echo $single_visa_processing_services_fees;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa-regular fa-receipt"></i> VAT <br><small>(Includes all)</small></td>
                                                            <td>৳ <?php echo $single_visa_processing_fees_vat;?></td>
                                                        </tr>
                                                        <tr class="grand-total">
                                                            <td><strong><i class="fa-regular fa-calculator"></i> Grand Total</strong></td>
                                                            <td><strong>৳ <?php echo $single_visa_processing_fees_total;?></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa-regular fa-clock"></i> Processing Time</td>
                                                            <td>Approx. 5–10 Working Days</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <button type="button" class="theme-btn w-100 text-white start-application">Start Application</button>

                                            </div>

                                            <!-- MULTIPLE ENTRY -->
                                            <div id="multipleEntry" class="tab-pane fade">
                                                <br>
                                                <div class="date-picker mb-3">
                                                    <label for="gamca-date"><strong>Select Date:</strong></label>
                                                    <input type="date" id="gamca-date" name="gamca-date" min="<?php echo date('Y-m-d'); ?>" class="form-control" required>
                                                </div>

                                                <table class="fee-table-enhanced">
                                                    <thead>
                                                        <tr>
                                                            <th><i class="fa-regular fa-file-invoice-dollar"></i> Description</th>
                                                            <th><i class="fa-regular fa-money-bill-wave"></i> Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fa-regular fa-passport"></i> Visa Fee</td>
                                                            <td>৳ <?php echo $multiple_visa_processing_fees;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa-regular fa-hand-holding-dollar"></i> Service Fee</td>
                                                            <td>৳ <?php echo $multiple_visa_processing_services_fees;?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa-regular fa-receipt"></i> VAT <br><small>(Includes all)</small></td>
                                                            <td>৳ <?php echo $multiple_visa_processing_fees_vat;?></td>
                                                        </tr>
                                                        <tr class="grand-total">
                                                            <td><strong><i class="fa-regular fa-calculator"></i> Grand Total</strong></td>
                                                            <td><strong>৳ <?php echo $multiple_visa_processing_fees_total;?></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa-regular fa-clock"></i> Processing Time</td>
                                                            <td>Approx. 5–10 Working Days</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <button type="button" class="theme-btn w-100 text-white start-application">Start Application</button>

                                            </div>

                                        </div><!-- .tab-content -->

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Widget -->
                        <div class="single-sidebar-widget">
                            <div class="wid-title"><h4>Contact Us</h4></div>
                            <div class="news-widget-categories visa-contact">
                                <?php 
                                    $contact_phone  = get_field('contact_phone', 'option');
                                    $contact_email  = get_field('contact_email', 'option');
                                    $contact_address = get_field('contact_address', 'option');
                                ?>
                                <ul>
                                    <?php if (!empty($contact_phone)) : ?>
                                        <li><i class="fa-regular fa-phone"></i> <?php echo esc_html($contact_phone); ?></li>
                                    <?php endif; ?>
                                    <?php if (!empty($contact_email)) : ?>
                                        <li><i class="fa-regular fa-envelope"></i> <?php echo esc_html($contact_email); ?></li>
                                    <?php endif; ?>
                                    <?php if (!empty($contact_address)) : ?>
                                        <li><i class="fa-regular fa-location-dot"></i> <?php echo esc_html($contact_address); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const startBtns = document.querySelectorAll('.start-application');
    const visaCategorySpan = document.getElementById('visaCategory');
    const visaPriceSpan = document.getElementById('visaPrice');

    function updateSidebar(navLink) {
        const category = navLink.getAttribute('data-category');
        const price = navLink.getAttribute('data-price');
        visaCategorySpan.textContent = category;
        visaPriceSpan.textContent = price;
    }

    // Update sidebar when tab is clicked
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            updateSidebar(link);
        });
    });

    // Start Application buttons
    startBtns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();

            const tabPane = btn.closest('.tab-pane');
            const entryType = tabPane.id === 'singleEntry' ? 'SINGLE ENTRY' : 'MULTIPLE ENTRY';

            const selectedDate = tabPane.querySelector('input[type="date"]').value;
            if (!selectedDate) {
                alert('Please select a date.');
                return;
            }

            const activeNavLink = document.querySelector(`.nav-link[href="#${tabPane.id}"]`);
            const category = activeNavLink.getAttribute('data-category');
            const price = activeNavLink.getAttribute('data-price');

            const visaId = "<?php echo esc_js($post_id); ?>";
            const visaName = "<?php echo esc_js($visa_name); ?>";

            let url = "<?php echo site_url('/visa-booking/'); ?>";
            url += `?visa_id=${encodeURIComponent(visaId)}`;
            url += `&visa_name=${encodeURIComponent(visaName)}`;
            url += `&entry_type=${encodeURIComponent(entryType)}`;
            url += `&category=${encodeURIComponent(category)}`;
            url += `&price=${encodeURIComponent(price)}`;
            url += `&date=${encodeURIComponent(selectedDate)}`;

            window.location.href = url;
        });
    });

    // Initialize sidebar with active tab on page load
    const activeNav = document.querySelector('.nav-link.active');
    if(activeNav){
        updateSidebar(activeNav);
    }
});
</script>

<?php get_footer(); ?>
