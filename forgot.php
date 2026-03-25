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
                <img src="logo.png" alt="AuthFlow logo" class="landing-brand-logo">
                <span>AuthFlow</span>
            </a>

            <a href="login.php" class="landing-signin-btn">Back to Login</a>
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

                    <form method="post" action="#" class="forgot-form">
                        <div class="forgot-field">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>
                        </div>

                        <div class="forgot-field">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
                        </div>

                        <button type="submit" class="forgot-submit-btn">Update Password</button>
                    </form>

                    <div class="forgot-links">
                        <a href="login.php">Remembered your password?</a>
                        <a href="register.php">Create account instead</a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
