<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | AuthFlow</title>
    <link rel="shortcut icon" href="favicon/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="components/user-dashboard.css">
</head>

<body>
    <div class="user-dashboard-shell">
        <header class="user-dashboard-navbar">
            <a class="user-dashboard-brand" href="index.php" aria-label="AuthFlow home">
                <img src="logo.png" alt="AuthFlow logo" class="user-dashboard-brand-logo">
                <span>AuthFlow</span>
            </a>

            <nav class="user-dashboard-navlinks">
                <a href="profile.php">Profile</a>
                <a href="otp.php">OTP</a>
                <a href="logout.php" class="user-dashboard-signout-btn">Sign Out</a>
            </nav>
        </header>

        <main class="user-dashboard-main">
            <section class="user-hero-panel">
                <div class="user-hero-copy">
                    <span class="user-badge">User Dashboard</span>
                    <h1>Welcome back, your account is active and ready to use.</h1>
                    <p>
                        This dashboard gives users a clear overview of their authentication status, profile setup,
                        recent security activity, and quick actions inside the AuthFlow system.
                    </p>

                    <div class="user-hero-actions">
                        <a href="profile.php" class="user-primary-btn">Manage Profile</a>
                        <a href="forgot.php" class="user-secondary-btn">Update Password</a>
                    </div>
                </div>

                <div class="user-identity-card">
                    <div class="user-avatar">RR</div>
                    <h2>Rohan Raj</h2>
                    <p>Verified member with secure access enabled.</p>
                    <div class="user-status-list">
                        <div>
                            <span>Email Status</span>
                            <strong>Verified</strong>
                        </div>
                        <div>
                            <span>OTP Security</span>
                            <strong>Enabled</strong>
                        </div>
                        <div>
                            <span>Account State</span>
                            <strong>Active</strong>
                        </div>
                    </div>
                </div>
            </section>

            <section class="user-stats-grid">
                <article class="user-stat-card">
                    <span>Last Login</span>
                    <h3>Today</h3>
                    <p>Secure sign-in completed from a trusted device.</p>
                </article>

                <article class="user-stat-card">
                    <span>Password Strength</span>
                    <h3>Strong</h3>
                    <p>Your credential quality is aligned with security best practice.</p>
                </article>

                <article class="user-stat-card">
                    <span>Profile Completion</span>
                    <h3>92%</h3>
                    <p>Only a few small details remain before the profile is fully complete.</p>
                </article>
            </section>

            <section class="user-dashboard-content">
                <div class="user-panel">
                    <header class="user-panel-header">
                        <div>
                            <h2>Recent Account Activity</h2>
                            <p>Your latest authentication and profile events.</p>
                        </div>
                    </header>

                    <div class="user-activity-list">
                        <article class="user-activity-item">
                            <div>
                                <h3>Successful Login</h3>
                                <p>Signed in from your primary device with verified credentials.</p>
                            </div>
                            <span class="user-status success">Just now</span>
                        </article>

                        <article class="user-activity-item">
                            <div>
                                <h3>OTP Verified</h3>
                                <p>A one-time password was used to confirm secure account access.</p>
                            </div>
                            <span class="user-status info">2 hrs ago</span>
                        </article>

                        <article class="user-activity-item">
                            <div>
                                <h3>Profile Updated</h3>
                                <p>Your personal information and photo were recently refreshed.</p>
                            </div>
                            <span class="user-status neutral">Yesterday</span>
                        </article>
                    </div>
                </div>

                <div class="user-panel">
                    <header class="user-panel-header">
                        <div>
                            <h2>Quick Access</h2>
                            <p>Shortcuts for the most common account tasks.</p>
                        </div>
                    </header>

                    <div class="user-shortcut-grid">
                        <a href="profile.php" class="user-shortcut-card">
                            <h3>Edit Profile</h3>
                            <p>Update your personal details and photo.</p>
                        </a>

                        <a href="forgot.php" class="user-shortcut-card">
                            <h3>Reset Password</h3>
                            <p>Change your current password securely.</p>
                        </a>

                        <a href="otp.php" class="user-shortcut-card">
                            <h3>Verify OTP</h3>
                            <p>Complete or retry OTP confirmation.</p>
                        </a>

                        <a href="index.php" class="user-shortcut-card">
                            <h3>Back to Home</h3>
                            <p>Return to the main landing experience.</p>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
