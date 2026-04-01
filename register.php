<?php
include 'components/common.php';

date_default_timezone_set('Asia/Kolkata');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Auth System</title>
    <link rel="shortcut icon" href="favicon/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="components/landing.css">
    <link rel="stylesheet" href="components/register.css">
</head>

<body>
    <div class="landing-shell register-shell">
        <header class="landing-navbar">
            <a class="landing-brand" href="index.php" aria-label="AuthFlow home">
                <img src="img/logo.png" alt="AuthFlow logo" class="landing-brand-logo">
                <span>AuthFlow</span>
            </a>

            <a href="login.php" class="landing-btn">Sign In</a>
        </header>

        <main class="register-layout">
            <section class="register-copy-panel">
                <span class="landing-badge">Create Account</span>
                <h1>Start your authentication journey with a secure and complete profile setup.</h1>
                <p>
                    This registration page is designed to feel consistent with the landing page while collecting the
                    key account details your authentication system needs for secure sign-up and profile creation.
                </p>

                <div class="register-points">
                    <div class="register-point">
                        <h3>Identity Details</h3>
                        <p>Name, email, phone, and address help create a complete user profile from the beginning.</p>
                    </div>

                    <div class="register-point">
                        <h3>Secure Password Setup</h3>
                        <p>A strong password becomes the main credential used later during secure login validation.</p>
                    </div>

                    <div class="register-point">
                        <h3>Profile Personalization</h3>
                        <p>Uploading a photo makes the dashboard and profile area feel more personal and complete.</p>
                    </div>
                </div>
            </section>

            <section class="register-form-panel">
                <div class="register-card-glow"></div>
                <div class="register-form-card">
                    <div class="register-form-header">
                        <div>
                            <span class="register-kicker">Registration</span>
                            <h2>Create your account</h2>
                            <p class="register-intro">Fill in your details below to register for the authentication system.</p>
                        </div>

                        <div class="register-trust-box">
                            <strong>Quick setup</strong>
                            <span>Profile, credentials, and contact details in one secure form.</span>
                        </div>
                    </div>

                    <form method="POST" action="controller/registration_process.php" class="register-form" enctype="multipart/form-data">
                        <div class="register-grid">
                            <div class="register-field">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                                <div class="invalid-feedback"></div>
                                <small>Use your real name for a more trusted profile.</small>
                            </div>

                            <div class="register-field">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                                <div class="invalid-feedback"></div>
                                <small>This email will be used for login and account communication.</small>
                            </div>
                        </div>

                        <div class="register-grid">
                            <div class="register-field">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                                <div class="invalid-feedback"></div>
                                <small>Choose a strong password with letters, numbers, and symbols.</small>
                            </div>

                            <div class="register-field">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
                                <div class="invalid-feedback"></div>
                                <small>Add an active number for future verification or support.</small>
                            </div>
                        </div>

                        <div class="register-field register-field-wide">
                            <label for="address">Address</label>
                            <textarea id="address" class="form-control" name="address" rows="4" placeholder="Enter your address" required></textarea>
                            <div class="invalid-feedback"></div>
                            <small>Your address helps build a more complete account profile.</small>
                        </div>

                        <div class="register-upload-card">
                            <div class="register-upload-copy">
                                <label for="photo">Profile Photo</label>
                                <p>Upload a clear photo to personalize your profile and dashboard.</p>
                            </div>
                            <input type="file" class="form-control" id="photo" name="photo" accept=".jpg,.jpeg,.png">
                            <div class="invalid-feedback"></div>
                        </div>

                        <button type="submit" class="register-submit-btn">Create Account Securely</button>
                    </form>

                    <div class="register-links">
                        <a href="login.php">Already have an account?</a>
                        <a href="forgot.php">Need help with password?</a>
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

        $(document).on('submit', '.register-form', function(e) {
            e.preventDefault();
            let form = $(this);
            let url = form.attr('action');
            let formData = new FormData(this);

            form.find('.invalid-feedback').text('').hide();
            form.find(".form-control").removeClass('is-invalid');

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',

                beforeSend: function() {
                    form.find('button[type="submit"]').prop('disabled', true).html(`
                                <span class="spinner-border spinner-border-sm"></span> Processing...
                            `);
                },

                success: function(response) {
                    if (response.status) {
                        $('#toast-msg').text(response.message);
                        toast.show();
                        form[0].reset();
                        setTimeout(() => {
                            window.location.href = 'login.php';
                        }, 1500);
                    } else {
                        const errors = response.error || {};

                        if (errors.general) {
                            $('#toast-msg').text(errors.general);
                            toast.show();
                        }

                        $.each(errors, (key, msg) => {
                            if (key === 'general') {
                                return;
                            }

                            let input = form.find('[name="' + key + '"]');
                            if (!input.length) {
                                return;
                            }

                            let feedback = input.closest('.register-field, .register-upload-card').find('.invalid-feedback').first();

                            if (input.attr('type') === 'file') {
                                input.closest('.register-upload-card').addClass('is-invalid');
                            } else {
                                input.addClass('is-invalid');
                            }
                            feedback.text(msg).show();
                        });
                        // Scroll to first error
                        let firstError = form.find('.is-invalid').first();
                        if (firstError.length) {
                            $('html, body').animate({
                                scrollTop: firstError.offset().top - 100
                            }, 500);
                        }
                    }

                },

                error: function() {
                    $('#toast-msg').text('An error occurred. Please try again.');
                    toast.show();
                },

                complete: function() {
                    form.find('button[type="submit"]').prop('disabled', false).text('Create Account Securely');
                }
            });

        });
    </script>
</body>

</html>