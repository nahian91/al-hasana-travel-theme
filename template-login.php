<?php
/*
Template Name: Login
*/
get_header();

// Redirect logged-in users
if ( is_user_logged_in() ) {
    wp_redirect( home_url('/dashboard/') );
    exit;
}

$login_error = '';

if ( isset($_POST['login_submit']) ) {
    $creds = array(
        'user_login'    => sanitize_user($_POST['log']),
        'user_password' => $_POST['pwd'],
        'remember'      => isset($_POST['remember']) ? true : false
    );

    $user = wp_signon($creds, false);

    if ( is_wp_error($user) ) {
        $login_error = $user->get_error_message();
    } else {
        wp_redirect( home_url('/dashboard/') );
        exit;
    }
}
?>

<!-- Breadcrumb -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image:url(<?php echo get_template_directory_uri();?>/assets/img/breadcrumb/breadcrumb.jpg);">
    <div class="container">
        <div class="page-heading">
            <h2>Login</h2>
        </div>
    </div>
</section>

<!-- Login Form -->
<section class="login-register-page comment-form-wrap login-form-single">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php if($login_error): ?>
                    <div class="error-msg" style="color:red;margin-bottom:10px;"><?php echo $login_error; ?></div>
                <?php endif; ?>

                <form method="post" class="registration-form">
                    <div class="form-clt">
                        <span>Username or Email</span>
                        <input type="text" name="log" placeholder="Username or Email" required>
                    </div>
                    <div class="form-clt">
                        <span>Password</span>
                        <input type="password" name="pwd" placeholder="Password" required>
                    </div>
                    <div class="form-clt">
                        <label><input type="checkbox" name="remember"> Remember Me</label>
                    </div>
                    <div class="form-clt">
                        <button type="submit" name="login_submit" class="theme-btn">Login</button>
                    </div>

                    <p class="mt-3">Don’t have an account? <a href="<?php echo home_url('/register/'); ?>">Register here</a></p>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
