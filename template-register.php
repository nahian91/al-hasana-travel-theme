<?php
/*
Template Name: Register
*/
get_header();

// Redirect logged-in users
if ( is_user_logged_in() ) {
    wp_redirect( home_url('/dashboard/') );
    exit;
}

$reg_errors = new WP_Error();

if ( isset($_POST['register_submit']) ) {
    $name             = sanitize_text_field($_POST['reg_name']);
    $email            = sanitize_email($_POST['reg_email']);
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
    if ( empty($name) ) {
        $reg_errors->add('empty_name', 'Name cannot be empty.');
    }

    // Create user
    if ( empty($reg_errors->errors) ) {
        $username = sanitize_user( current( explode('@', $email) ) );
        $user_id = wp_create_user($username, $password, $email);

        if ( ! is_wp_error($user_id) ) {
            // Save name
            $name_parts = explode(' ', $name, 2);
            update_user_meta($user_id, 'first_name', $name_parts[0]);
            if ( isset($name_parts[1]) ) update_user_meta($user_id, 'last_name', $name_parts[1]);

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
<section class="breadcrumb-wrapper fix bg-cover" style="background-image:url(<?php echo get_template_directory_uri();?>/assets/img/breadcrumb/breadcrumb.jpg);">
    <div class="container">
        <div class="page-heading">
            <h2>Register</h2>
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
                    <div class="form-clt">
                        <span>Name</span>
                        <input type="text" name="reg_name" placeholder="Full Name" required>
                    </div>

                    <div class="form-clt">
                        <span>Email</span>
                        <input type="email" name="reg_email" placeholder="Email" required>
                    </div>

                    <div class="form-clt">
                        <span>Password</span>
                        <input type="password" name="reg_password" placeholder="Password" required>
                    </div>

                    <div class="form-clt">
                        <span>Confirm Password</span>
                        <input type="password" name="reg_password_confirm" placeholder="Confirm Password" required>
                    </div>

                    <div class="form-clt">
                        <button type="submit" name="register_submit" class="theme-btn">Register</button>
                    </div>

                    <p class="mt-3">Already have an account? <a href="<?php echo home_url('/login/'); ?>">Login here</a></p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
