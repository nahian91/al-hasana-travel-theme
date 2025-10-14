<?php
/*
Template Name: Visa Booking
*/
get_header();

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
?>

<section class="breadcrumb-wrapper fix bg-cover"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/breadcrumb.jpg);">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <h2>Visa Booking - <?php echo esc_html($visa_name); ?></h2>
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

<form action="#" method="POST" enctype="multipart/form-data" id="tour-form">
    <div class="row g-3">

    <!-- Full Name -->
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

        <!-- Email -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Email</span>
                <input type="email" name="tour_email" class="form-control" placeholder="Email" required>
            </div>
        </div>

        <!-- Phone -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Mobile No</span>
                <input type="text" name="tour_phone" class="form-control" placeholder="Phone" required>
            </div>
        </div>

        

        <!-- Email -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Address</span>
                <input type="text" name="tour_email" class="form-control" placeholder="Address" required>
            </div>
        </div>   

        <!-- Upload Passport -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Upload Passport</span>
                <input type="file" name="tour_passport_upload" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="date-picker mb-3">
                <label for="gamca-date"><strong>Issue Date</strong></label>
                <input type="date" id="gamca-date" name="gamca-date" min="<?php echo date('Y-m-d'); ?>" class="form-control" required>
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
            <input type="date" id="gamca-date" name="gamca-date" min="<?php echo date('Y-m-d'); ?>" class="form-control" required>
        </div>
        </div>

        <!-- Submit -->
        <div class="col-md-12">
            <button type="submit" class="theme-btn btn w-100">Submit Request</button>
        </div>

    </div>
</form>

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
