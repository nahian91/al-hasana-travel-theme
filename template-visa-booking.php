<?php
/*
Template Name: Visa Booking
*/
get_header();

$visa_processing_banner = get_field('visa_processing_banner');

// Get data from URL
$visa_id    = isset($_GET['visa_id']) ? intval($_GET['visa_id']) : 0;
$visa_name  = isset($_GET['visa_name']) ? sanitize_text_field($_GET['visa_name']) : '';
$entry_type = isset($_GET['entry_type']) ? sanitize_text_field($_GET['entry_type']) : '';
$category   = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
$price      = isset($_GET['price']) ? sanitize_text_field($_GET['price']) : '';
$date       = isset($_GET['date']) ? sanitize_text_field($_GET['date']) : '';

// If visa ID exists, get ACF fields
if ($visa_id) {
    $single_fee = get_field('single_visa_processing_fees', $visa_id);
    $single_service = get_field('single_visa_processing_services_fees', $visa_id);
    $single_vat = get_field('single_visa_processing_fees_vat', $visa_id);
    $single_total = get_field('single_visa_processing_fees_total', $visa_id);

    $multiple_fee = get_field('multiple_visa_processing_fees', $visa_id);
    $multiple_service = get_field('multiple_visa_processing_services_fees', $visa_id);
    $multiple_vat = get_field('multiple_visa_processing_fees_vat', $visa_id);
    $multiple_total = get_field('multiple_visa_processing_fees_total', $visa_id);
}

$page_banner = get_field('page_banner');
?>

<section class="breadcrumb-wrapper fix bg-cover"
        style="background-image: url(<?php echo $page_banner;?>);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2>Visa Booking - <?php echo esc_html($visa_name); ?></h2>
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

<section class="activities-details-section fix section-padding">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <!-- Left: Booking Form -->
            <div class="col-12 col-lg-8">
                 <div class="comment-form-wrap gtamca-form-single">
                    <h4>Visa Booking Form</h4>
<?php echo do_shortcode('[contact-form-7 id="3cce645" title="Visa Booking Form"]');?>
<!-- <form action="#" method="POST" enctype="multipart/form-data" id="tour-form">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-clt">
                <span>First Name</span>
                <input type="text" name="tour_fullname" class="form-control" placeholder="Full Name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-clt">
                <span>Last Name</span>
                <input type="text" name="tour_fullname" class="form-control" placeholder="Full Name" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-clt">
                <span>Email</span>
                <input type="email" name="tour_email" class="form-control" placeholder="Email" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-clt">
                <span>Mobile No</span>
                <input type="text" name="tour_phone" class="form-control" placeholder="Phone" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-clt">
                <span>Address</span>
                <input type="text" name="tour_email" class="form-control" placeholder="Address" required>
            </div>
        </div>   

        <div class="col-md-6">
            <div class="form-clt">
                <span>Upload Passport</span>
                <input type="file" name="tour_passport_upload" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="date-picker mb-3">
                <label for="gamca-date"><strong>Issue Date</strong></label>
                <input type="date" id="gamca-date" name="gamca-date" min="<?php //echo date('Y-m-d'); ?>" class="form-control" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-clt">
                <span>Issue Place</span>
                <input type="text" name="tour_email" class="form-control" placeholder="Address" required>
            </div>
        </div>
        <div class="col-md-6">

        <div class="date-picker mb-3">
            <label for="gamca-date"><strong>Expiry Date</strong></label>
            <input type="date" id="gamca-date" name="gamca-date" min="<?php //echo date('Y-m-d'); ?>" class="form-control" required>
        </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="theme-btn btn w-100">Submit Request</button>
        </div>

    </div>
</form> -->

                                                </div>
            </div>

            <!-- Right: Booking Info Table -->
            <div class="col-12 col-lg-4">
                <div class="single-sidebar-widget visa-prces-bok">

                    <div class="best-price-section mb-0 visa-category-page">
    <table class="fee-table-enhanced mt-3">
        <thead>
            <tr>
                <th><i class="fa-regular fa-file-invoice-dollar"></i> Description</th>
                <th><i class="fa-regular fa-money-bill-wave"></i> Amount / Info</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><i class="fa-regular fa-passport"></i> Entry Type</td>
                <td><?php echo esc_html($entry_type); ?></td>
            </tr>
            <tr>
                <td><i class="fa-regular fa-passport"></i> Visa Name</td>
                <td><?php echo esc_html($visa_name); ?></td>
            </tr>
            <tr>
                <td><i class="fa-regular fa-passport"></i> Visa Category</td>
                <td><?php echo esc_html($category); ?></td>
            </tr>
            <tr>
                <td><i class="fa-regular fa-calendar-days"></i> Selected Date</td>
                <td><?php echo esc_html($date); ?></td>
            </tr>
            <tr>
                <td><i class="fa-regular fa-passport"></i> Visa Fee</td>
                <td>৳ <?php echo $entry_type === 'SINGLE ENTRY' ? $single_fee : $multiple_fee; ?></td>
            </tr>
            <tr>
                <td><i class="fa-regular fa-hand-holding-dollar"></i> Service Fee</td>
                <td>৳ <?php echo $entry_type === 'SINGLE ENTRY' ? $single_service : $multiple_service; ?></td>
            </tr>
            <tr>
                <td><i class="fa-regular fa-receipt"></i> VAT <br><small>(Includes all)</small></td>
                <td>৳ <?php echo $entry_type === 'SINGLE ENTRY' ? $single_vat : $multiple_vat; ?></td>
            </tr>
            <tr class="grand-total">
                <td><strong><i class="fa-regular fa-calculator"></i> Grand Total</strong></td>
                <td><strong>৳ <?php echo $entry_type === 'SINGLE ENTRY' ? $single_total : $multiple_total; ?></strong></td>
            </tr>
            <tr>
                <td><i class="fa-regular fa-clock"></i> Processing Time</td>
                <td>Approx. 5–10 Working Days</td>
            </tr>
        </tbody>
    </table>
</div>

                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
