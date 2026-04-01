<?php
date_default_timezone_set('Asia/Kolkata');

include 'connection/connect.php';
include 'components/common.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Auth System</title>
    <link rel="shortcut icon" href="favicon/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="components/landing.css">
    <link rel="stylesheet" href="components/forgot.css">
</head>

<body>
    <div class="landing-shell forgot-shell">
        <header class="landing-navbar">
            <a class="landing-brand" href="index.php" aria-label="AuthFlow home">
                <img src="img/logo.png" alt="AuthFlow logo" class="landing-brand-logo">
                <span>AuthFlow</span>
            </a>

            <a href="login.php" class="landing-btn">Back to Login</a>
        </header>

        <main class="forgot-layout">
            <section class="forgot-copy-panel">
                <span class="landing-badge">Password Recovery</span>
                <h1>Create a fresh password and restore secure access to your account.</h1>
                <p>
                    This recovery screen is designed to feel consistent with the landing experience while guiding users
                    through a simple reset flow. A strong new password helps protect account data and keeps access secure.
                </p>

                <div class="forgot-points">
                    <div class="forgot-point">
                        <h3>Set a Strong Password</h3>
                        <p>Choose a password that is unique, memorable to you, and difficult for others to guess.</p>
                    </div>

                    <div class="forgot-point">
                        <h3>Confirm Before Saving</h3>
                        <p>Re-enter the password to avoid mistakes and ensure a smooth login after the reset.</p>
                    </div>

                    <div class="forgot-point">
                        <h3>Return Securely</h3>
                        <p>Once updated, the new password becomes the trusted credential for future sign-ins.</p>
                    </div>
                </div>
            </section>

            <section class="forgot-form-panel">
                <div class="forgot-card-glow"></div>
                <div class="forgot-form-card">
                    <span class="forgot-kicker">Reset Access</span>
                    <h2>Choose your new password</h2>
                    <p class="forgot-intro">Enter a new password and confirm it below to continue.</p>

                    <form method="POST" action="controller/forgot_process.php" class="forgot-form" enctype="multipart/form-data">
                        <div class="forgot-field">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter new email" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="forgot-field">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="forgot-field">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <button type="submit" class="forgot-submit-btn">Update Password</button>
                    </form>
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

        $(document).on('submit', '.forgot-form', function(e) {
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
                            window.location.href = 'login.php';
                        }, 3000);
                    } else {
                        if (response.error.general) {
                            $('#toast-msg').text(response.error.general);
                            toast.show();
                            alert(response.error);
                        }
                        $.each(response.error, function(key, msg) {

                            let input = form.find('[name="' + key + '"]');

                            input.addClass('is-invalid');
                            input.next('.invalid-feedback').text(msg).show();
                        });
                    }
                },

                error: function() {
                    $('#toast-msg').text('An error occurred. Please try again.');
                    toast.show();
                },

                complete: function() {
                    form.find('button[type="submit"]').prop('disabled', false).text('Update Password');
                }
            });

        });
    </script>

</body>

</html>