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
                <img src="logo.png" alt="AuthFlow logo" class="landing-brand-logo">
                <span>AuthFlow</span>
            </a>

            <a href="login.php" class="landing-signin-btn">Sign In</a>
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

                    <form method="post" action="#" class="register-form" enctype="multipart/form-data">
                        <div class="register-grid">
                            <div class="register-field">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                                <small>Use your real name for a more trusted profile.</small>
                            </div>

                            <div class="register-field">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="you@example.com" required>
                                <small>This email will be used for login and account communication.</small>
                            </div>
                        </div>

                        <div class="register-grid">
                            <div class="register-field">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Create a password" required>
                                <small>Choose a strong password with letters, numbers, and symbols.</small>
                            </div>

                            <div class="register-field">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>
                                <small>Add an active number for future verification or support.</small>
                            </div>
                        </div>

                        <div class="register-field register-field-wide">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" rows="4" placeholder="Enter your address" required></textarea>
                            <small>Your address helps build a more complete account profile.</small>
                        </div>

                        <div class="register-upload-card">
                            <div class="register-upload-copy">
                                <label for="photo">Profile Photo</label>
                                <p>Upload a clear photo to personalize your profile and dashboard.</p>
                            </div>
                            <input type="file" id="photo" name="photo" accept="image/*">
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
    </div>
</body>

</html>
