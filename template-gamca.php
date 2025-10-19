<?php
/*
Template Name: Gamca
*/

get_header();

$page_banner = get_field('page_banner');
?>

        <!-- breadcrumb-wrappe-Section Start -->
        <section class="breadcrumb-wrapper fix bg-cover" style="background-image: url(<?php echo $page_banner;?>);">
            <div class="container">
                <div class="row">
                    <div class="page-heading">
                        <h2><?php the_title();?></h2>
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

        <section class="tour-section section-padding fix">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="comment-form-wrap gtamca-form-single">
                    <h4>GAMCA Medical Appointment Booking</h4>

<form action="#" method="POST" enctype="multipart/form-data" id="tour-form">
    <div class="row g-3">

    <!-- City -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>City (যে শহরে মেডিকেল দিবে)</span>
                <select name="tour_city" class="form-control nice-select" required>
                    <option value="">Select City</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Cumilla">Cumilla</option>
                    <option value="Barishal">Barishal</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Cox's Bazar">Cox's Bazar</option>
                </select>
            </div>
        </div>

        <!-- Travelling Country -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Travelling Country (যে দেশে গমন করবে)</span>
                <select name="tour_country" class="form-control nice-select" required>
                    <option value="">Select Country</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Oman">Oman</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="UAE">UAE</option>
                    <option value="Bahrain">Bahrain</option>
                </select>
            </div>
        </div>

        <!-- Full Name -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Full Name (পূর্ণ নাম)</span>
                <input type="text" name="tour_fullname" class="form-control" placeholder="Full Name" required>
            </div>
        </div>

        <!-- Passport Number -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Passport Number (পাসপোর্ট নম্বর)</span>
                <input type="text" name="tour_passport" class="form-control" placeholder="E.g. A11112222" required>
            </div>
        </div>

        <!-- Marital Status -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Marital Status (বৈবাহিক অবস্থা)</span>
                <select name="tour_marital" class="form-control nice-select" required>
                    <option value="">Select</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
        </div>

        <!-- Visa Type -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Visa Type (ভিসার ধরণ)</span>
                <select name="tour_visa" class="form-control nice-select" required>
                    <option value="">Select</option>
                    <option value="Work Visa">Work Visa</option>
                    <option value="Family Visa">Family Visa</option>
                </select>
            </div>
        </div>

        <!-- Position Applied For -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Position Applied For (আবেদনকৃত পদ)</span>
                <select name="tour_position" class="form-control nice-select" required>
                    <option value="">Select</option>
                    <option value="Carpenter">Carpenter</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Electrician">Electrician</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Labour">Labour</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Driver">Driver</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <!-- Phone -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Mobile No. (মোবাইল নম্বর)</span>
                <input type="text" name="tour_phone" class="form-control" placeholder="Phone" required>
            </div>
        </div>

        <!-- Email -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Email (ইমেইল)</span>
                <input type="email" name="tour_email" class="form-control" placeholder="Email" required>
            </div>
        </div>

        <!-- Upload Passport -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Upload Passport (পাসপোর্ট আপলোড)</span>
                <input type="file" name="tour_passport_upload" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
            </div>
        </div>

        <!-- Payment Method -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Payment Method (পরিশোধ পদ্ধতি)</span>
                <select name="tour_payment_method" id="payment-method" class="form-control nice-select" required>
                    <option value="">Select Payment</option>
                    <option value="bKash">bKash</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Bank Account">Bank Account</option>
                    <option value="Upay">Upay</option>
                    <option value="Rocket">Rocket</option>
                </select>
            </div>
        </div>

        <!-- Mobile/Bank Number -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Send Money Here (টাকা পাঠান এখানে)</span>
                <input type="text" name="tour_payment_number" id="payment-number" class="form-control" placeholder="+880 1777 900013" disabled required>
            </div>
        </div>

        <!-- Mobile/Bank Number -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Mobile / Bank Number (মোবাইল / ব্যাংক নম্বর)</span>
                <input type="text" name="tour_payment_number" id="payment-number" class="form-control" placeholder="Enter Mobile/Bank Number"  required>
            </div>
        </div>

        <!-- Transaction Number -->
        <div class="col-md-6">
            <div class="form-clt">
                <span>Transaction Number (লেনদেন নম্বর)</span>
                <input type="text" name="tour_transaction_number" class="form-control" placeholder="Enter Transaction Number" required>
            </div>
        </div>

        <!-- Terms & Notice -->
        <div class="col-md-12">
            <p class="text-danger">বিশেষ সতর্কতাঃ সাবমিট এর পূর্বে সকল তথ্য পুণরায় যাচাই করে নিন। ভুল তথ্য সাবমিট হলে alhasanatravels.com কর্তৃপক্ষ দায়ী নয়।</p>
        </div>

        <!-- Submit -->
        <div class="col-md-12">
            <button type="submit" class="theme-btn btn w-100">Submit Tour Request</button>
        </div>

    </div>
</form>

<script>
    $(document).ready(function() {
        $('select.nice-select').niceSelect();

        const paymentMethod = document.getElementById('payment-method');
        const paymentNumber = document.getElementById('payment-number');

        paymentMethod.addEventListener('change', function() {
            if (this.value === 'Bank Account') {
                paymentNumber.placeholder = 'Enter Bank Account Number';
                paymentNumber.disabled = false;
            } else if (this.value) {
                paymentNumber.placeholder = 'Enter Mobile Number';
                paymentNumber.disabled = false;
            } else {
                paymentNumber.disabled = true;
                paymentNumber.value = '';
            }
        });
    });
</script>



                                                </div>
            </div>
        </div>
    </div>
</section>

        <?php get_footer();?>