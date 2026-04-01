<?php
include 'components/common.php';

date_default_timezone_set('Asia/Kolkata');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Auth System</title>
    <link rel="shortcut icon" href="favicon/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="components/landing.css">
    <link rel="stylesheet" href="components/login.css">
</head>

<body>
    <div class="landing-shell auth-shell">
        <header class="landing-navbar">
            <a class="landing-brand" href="index.php" aria-label="AuthFlow home">
                <img src="img/logo.png" alt="AuthFlow logo" class="landing-brand-logo">
                <span>AuthFlow</span>
            </a>

            <a href="register.php" class="landing-btn">Create Account</a>
        </header>

        <main class="auth-layout">
            <section class="auth-copy-panel">
                <span class="landing-badge">Welcome Back</span>
                <h1>Sign in to continue to your secure authentication workspace.</h1>
                <p>
                    Access your account using your registered email and password. This sign-in page follows the same trusted
                    authentication flow introduced on the landing page, with a clean layout and clear actions.
                </p>

                <div class="auth-feature-list">
                    <div class="auth-feature-item">
                        <h3>Protected Access</h3>
                        <p>Only verified users should enter the dashboard and profile area.</p>
                    </div>

                    <div class="auth-feature-item">
                        <h3>Credential Validation</h3>
                        <p>Your email and password are checked before a secure session is created.</p>
                    </div>

                    <div class="auth-feature-item">
                        <h3>Simple Experience</h3>
                        <p>The page keeps the login process focused, fast, and easy to understand.</p>
                    </div>
                </div>
            </section>

            <section class="auth-form-panel">
                <div class="auth-card-glow"></div>
                <div class="auth-form-card">
                    <span class="auth-kicker">Sign In</span>
                    <h2>Login to your account</h2>
                    <p class="auth-intro">Enter your email and password to access your account securely.</p>

                    <form method="post" action="controller/login_process.php" class="auth-form" enctype="multipart/form-data">
                        <div class="auth-field">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="auth-field">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <button type="submit" class="auth-submit-btn">Sign In Securely</button>
                    </form>

                    <div class="auth-links">
                        <a href="forgot.php">Forgot password?</a>
                        <a href="register.php">Create a new account</a>
                    </div>
                </div>
            </section>
        </main>

        <!--Toast-->
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="img/logo.png" class="rounded me-2" alt="logo" width="20" height="20">
                    <strong class="me-auto">AuthFlow</strong>
                    <small><?= date('h:i A', time()) ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div id="toast-msg" class="toast-body">

                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </div>

    <!--using ajax-->
    <script>
        const toastEl = document.getElementById('liveToast');
        const toast = new bootstrap.Toast(toastEl, {
            delay: 3000
        });

        $(document).on('submit', '.auth-form', function(e) {
            e.preventDefault();
            let form = $(this);
            let url = form.attr('action');
            let formData = new FormData(this);

            form.find('.invalid-feedback').text('').hide();
            form.find(".form-control").removeClass('is-invalid');

            $.ajax({
                url: url,
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',

                beforeSend: function() {
                    form.find('button[type="submit"]').prop('disabled', true).html(`<div class="text-center "> 
                    <div class = "spinner-border" role = "status" >
                         <span class = "visually-hidden" > Loading... < /span> 
                         </div > 
                    <div>`);
                },

                success: function(response) {
                    if (response.status) {
                        $('#toast-msg').text(response.message);
                        toast.show();
                        form[0].reset();
                        setTimeout(() => {
                            window.location.href = 'dashboard.php';
                        }, 3000);
                    } else {
                        if (response.error.general) {
                            $('#toast-msg').text(response.error.general);
                            toast.show();
                        }

                        $.each(response.error, (key, msg) => {
                            let input = form.find('[name="' + key + '"]');

                            input.addClass('is-invalid');
                            input.next('.invalid-feedback').text(msg);
                        });
                    }

                },

                error: function() {
                    $('#toast-msg').text('An error occurred. Please try again.');
                    toast.show();
                },

                complete: function() {
                    form.find('button[type="submit"]').prop('disabled', false).text('Sign In Securely');
                }
            });

        });
    </script>
</body>

</html>