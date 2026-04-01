<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth System Overview</title>
    <link rel="shortcut icon" href="favicon/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="components/landing.css">
</head>

<body>
    <div class="landing-shell">
        <header class="landing-navbar">
            <a class="landing-brand" href="index.php" aria-label="AuthFlow home">
                <img src="img/logo.png" alt="AuthFlow logo" class="landing-brand-logo">
                <span>AuthFlow</span>
            </a>

            <!--links validation-->

            <?php if (isset($_SESSION['logged_in'])): ?>
                <a href="dashboard.php" class="landing-btn">Go To Dashboard</a>
                <a href="logout.php" class="landing-btn">Logout</a>
            <?php else: ?>
                <a href="login.php" class="landing-btn">Login</a>
            <?php endif; ?>
        </header>

        <main class="landing-main">
            <section class="landing-hero">
                <div class="landing-hero-copy">
                    <span class="landing-badge">Authentication System</span>
                    <h1>Secure access starts with a clear and trusted sign-in experience.</h1>
                    <p>
                        This authentication system helps users register, sign in, verify access, and manage their profile with a smooth workflow.
                        It is designed to protect user identity while keeping the overall experience simple and friendly.
                    </p>

                    <div class="landing-hero-actions">
                        <a href="login.php" class="landing-primary-cta">Sign In Now</a>
                        <a href="register.php" class="landing-secondary-cta">Create Account</a>
                    </div>
                </div>

                <div class="landing-hero-card">
                    <p class="landing-card-eyebrow">Why Authentication Matters</p>
                    <h2>It verifies who the user is before access is granted.</h2>
                    <ul class="landing-checklist">
                        <li>Protects private profile and account data</li>
                        <li>Prevents unauthorized access to the dashboard</li>
                        <li>Supports secure password handling and session control</li>
                        <li>Creates a reliable path for future OTP and recovery features</li>
                    </ul>
                </div>
            </section>

            <section class="landing-info-grid">
                <article class="landing-info-card">
                    <span class="landing-card-number">01</span>
                    <h3>Registration</h3>
                    <p>
                        New users provide basic details such as name, email, phone, address, password, and profile photo.
                        The system validates this data before creating the account.
                    </p>
                </article>

                <article class="landing-info-card">
                    <span class="landing-card-number">02</span>
                    <h3>Login Validation</h3>
                    <p>
                        During sign-in, the entered email and password are checked against stored records.
                        Password verification ensures only valid credentials unlock the account.
                    </p>
                </article>

                <article class="landing-info-card">
                    <span class="landing-card-number">03</span>
                    <h3>Session Access</h3>
                    <p>
                        After successful login, a session is created so protected pages like the dashboard remain available only to authenticated users.
                    </p>
                </article>
            </section>

            <section class="landing-docs">
                <div class="landing-section-heading">
                    <span class="landing-badge">System Overview</span>
                    <h2>How this authentication flow works</h2>
                </div>

                <div class="landing-doc-panels">
                    <article class="landing-doc-card">
                        <h3>Core Flow</h3>
                        <p>
                            The flow begins with account creation, continues through login credential verification,
                            and ends with controlled access to protected pages using PHP sessions.
                        </p>
                    </article>

                    <article class="landing-doc-card">
                        <h3>Security Focus</h3>
                        <p>
                            The current system uses password hashing and server-side session checks.
                            These are the foundation for building a safer application environment.
                        </p>
                    </article>

                    <article class="landing-doc-card">
                        <h3>Future Ready</h3>
                        <p>
                            Your project already hints at OTP and recovery screens, which means the authentication module can grow into a more advanced multi-step verification system.
                        </p>
                    </article>
                </div>
            </section>

            <section class="landing-overview-panel">
                <div>
                    <span class="landing-badge">Overview of Authentication System</span>
                    <h2>A good authentication system balances security, trust, and usability.</h2>
                </div>
                <p>
                    In this project, authentication is the gatekeeper of the application. It identifies the user,
                    validates credentials, starts a secure session, and limits access to sensitive pages until the user is verified.
                    This makes the application more professional, dependable, and safer for real users.
                </p>
            </section>
        </main>
        <?php include 'footer.php' ?>
    </div>
</body>

</html>