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
                <img src="logo.png" alt="AuthFlow logo" class="landing-brand-logo">
                <span>AuthFlow</span>
            </a>

            <a href="register.php" class="landing-signin-btn">Create Account</a>
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

                    <form method="post" action="login_process.php" class="auth-form">
                        <div class="auth-field">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="you@example.com" required>
                        </div>

                        <div class="auth-field">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
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
    </div>
</body>

</html>
