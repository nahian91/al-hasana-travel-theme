<?php
/*
Template Name: Register
*/
get_header();

$page_banner = get_field('page_banner');

// Redirect logged-in users
if ( is_user_logged_in() ) {
    wp_redirect( home_url('/dashboard/') );
    exit;
}

$reg_errors = new WP_Error();

if ( isset($_POST['register_submit']) ) {
    $agency_name      = sanitize_text_field($_POST['reg_agency_name']);
    $agency_address   = sanitize_text_field($_POST['reg_agency_address']);
    $full_name        = sanitize_text_field($_POST['reg_full_name']);
    $email            = sanitize_email($_POST['reg_email']);
    $phone            = sanitize_text_field($_POST['reg_phone']);
    $password         = $_POST['reg_password'];
    $password_confirm = $_POST['reg_password_confirm'];

    // Validation
    if ( email_exists($email) ) {
        $reg_errors->add('email_exists', 'Email already registered.');
    }
    if ( empty($password) ) {
        $reg_errors->add('empty_password', 'Password cannot be empty.');
    }
    if ( $password !== $password_confirm ) {
        $reg_errors->add('password_mismatch', 'Passwords do not match.');
    }
    if ( empty($full_name) ) {
        $reg_errors->add('empty_name', 'Full Name cannot be empty.');
    }
    if ( empty($agency_name) ) {
        $reg_errors->add('empty_agency', 'Agency Name cannot be empty.');
    }
    if ( empty($agency_address) ) {
        $reg_errors->add('empty_address', 'Agency Address cannot be empty.');
    }
    if ( empty($phone) ) {
        $reg_errors->add('empty_phone', 'Phone cannot be empty.');
    }

    // Create user
    if ( empty($reg_errors->errors) ) {
        $username = sanitize_user( current( explode('@', $email) ) );
        $user_id = wp_create_user($username, $password, $email);

        if ( ! is_wp_error($user_id) ) {
            // Save full name
            $name_parts = explode(' ', $full_name, 2);
            update_user_meta($user_id, 'first_name', $name_parts[0]);
            if ( isset($name_parts[1]) ) update_user_meta($user_id, 'last_name', $name_parts[1]);

            // Save other custom fields
            update_user_meta($user_id, 'agency_name', $agency_name);
            update_user_meta($user_id, 'agency_address', $agency_address);
            update_user_meta($user_id, 'phone', $phone);

            // Auto-login
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            do_action('wp_login', $username, get_userdata($user_id));

            wp_redirect( home_url('/dashboard/') );
            exit;
        } else {
            $reg_errors->add('wp_error', $user_id->get_error_message());
        }
    }
}
?>

<!-- Breadcrumb -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image:url(<?php echo $page_banner;?>);">
    <div class="container">
        <div class="page-heading">
            <h2>Register</h2>
            <!-- Down Arrow SVG -->
                <div class="scroll-down-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" viewBox="0 0 24 24">
                        <path d="M12 13.5l-5-5 1.41-1.41L12 10.67l3.59-3.58L17 8.5z"/>
                        <path d="M12 19.5l-5-5 1.41-1.41L12 16.67l3.59-3.58L17 14.5z"/>
                    </svg>
                </div>
        </div>
    </div>
</section>

<!-- Registration Form -->
<section class="login-register-page comment-form-wrap login-form-single">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <?php
                if ( ! empty($reg_errors->errors) ) {
                    foreach ( $reg_errors->get_error_messages() as $error ) {
                        echo '<div class="error-msg" style="color:red;margin-bottom:10px;">'.$error.'</div>';
                    }
                }
                ?>

                <form method="post" class="registration-form">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-clt">
                            <span>Agency Name</span>
                            <input type="text" name="reg_agency_name" placeholder="Agency Name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-clt">
                            <span>Agency Address</span>
                            <input type="text" name="reg_agency_address" placeholder="Agency Address" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-clt">
                            <span>Full Name</span>
                            <input type="text" name="reg_full_name" placeholder="Full Name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-clt">
                            <span>Email</span>
                            <input type="email" name="reg_email" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-clt">
                            <span>Phone</span>
                            <input type="text" name="reg_phone" placeholder="Phone" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-clt">
                            <span>Password</span>
                            <input type="password" name="reg_password" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-clt">
                            <span>Confirm Password</span>
                            <input type="password" name="reg_password_confirm" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-clt">
                            <button type="submit" name="register_submit" class="theme-btn">Register</button>
                        </div>
                    </div>
                    </div>

                    <p class="mt-3">Already have an account? <a href="<?php echo home_url('/login/'); ?>">Login here</a></p>
                </form>
            </div>
        </div>
    </div>
</section>
<br>
<?php get_footer(); ?>
