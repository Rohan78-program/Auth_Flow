<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | AuthFlow</title>
    <link rel="shortcut icon" href="favicon/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="components/admin-dashboard.css">
</head>

<body>
    <div class="admin-dashboard-shell">
        <header class="admin-dashboard-navbar">
            <a class="admin-dashboard-brand" href="index.php" aria-label="AuthFlow home">
                <img src="img/logo.png" alt="AuthFlow logo" class="admin-dashboard-brand-logo">
                <span>AuthFlow Admin</span>
            </a>

            <nav class="admin-dashboard-navlinks">
                <a href="dashboard.php">User View</a>
                <a href="profile.php">Profile</a>
                <a href="logout.php" class="admin-dashboard-signout-btn">Sign Out</a>
            </nav>
        </header>

        <main class="admin-dashboard-main">
            <section class="admin-hero-panel">
                <div class="admin-hero-copy">
                    <span class="admin-badge">Admin Dashboard</span>
                    <h1>Monitor authentication health, user growth, and security activity from one place.</h1>
                    <p>
                        This dashboard is built for administrators who need a clear overview of login performance,
                        verification trends, account operations, and system-level signals inside AuthFlow.
                    </p>
                </div>

                <div class="admin-alert-card">
                    <span class="admin-alert-tag">System State</span>
                    <h2>Platform stable</h2>
                    <p>Authentication services are operating normally with no critical incidents.</p>
                </div>
            </section>

            <section class="admin-metric-grid">
                <article class="admin-metric-card">
                    <span>Total Users</span>
                    <h3>1,582</h3>
                    <p>Registered user accounts in the system.</p>
                </article>

                <article class="admin-metric-card">
                    <span>Active Sessions</span>
                    <h3>217</h3>
                    <p>Users currently authenticated across devices.</p>
                </article>

                <article class="admin-metric-card">
                    <span>OTP Requests</span>
                    <h3>1,045</h3>
                    <p>Verification attempts recorded today.</p>
                </article>

                <article class="admin-metric-card">
                    <span>Failed Logins</span>
                    <h3>27</h3>
                    <p>Recent unsuccessful login attempts detected.</p>
                </article>
            </section>

            <section class="admin-dashboard-content">
                <div class="admin-panel">
                    <header class="admin-panel-header">
                        <div>
                            <h2>Recent Authentication Events</h2>
                            <p>Latest login, OTP, and password recovery actions.</p>
                        </div>
                    </header>

                    <table class="admin-dashboard-table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>User</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09:12</td>
                                <td>rahul@example.com</td>
                                <td>Login</td>
                                <td><span class="admin-status success">Success</span></td>
                            </tr>
                            <tr>
                                <td>09:08</td>
                                <td>riya@example.com</td>
                                <td>OTP Verify</td>
                                <td><span class="admin-status success">Success</span></td>
                            </tr>
                            <tr>
                                <td>08:47</td>
                                <td>amit@example.com</td>
                                <td>Login</td>
                                <td><span class="admin-status danger">Failed</span></td>
                            </tr>
                            <tr>
                                <td>08:30</td>
                                <td>sneha@example.com</td>
                                <td>Password Reset</td>
                                <td><span class="admin-status pending">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="admin-side-column">
                    <div class="admin-panel">
                        <header class="admin-panel-header">
                            <div>
                                <h2>Security Snapshot</h2>
                                <p>Quick indicators of platform risk and verification posture.</p>
                            </div>
                        </header>

                        <div class="admin-security-grid">
                            <div>
                                <h4>Blocked IPs</h4>
                                <p>6</p>
                            </div>
                            <div>
                                <h4>2FA Adoption</h4>
                                <p>88%</p>
                            </div>
                            <div>
                                <h4>Recovery Requests</h4>
                                <p>8</p>
                            </div>
                            <div>
                                <h4>Admin Alerts</h4>
                                <p>2</p>
                            </div>
                        </div>
                    </div>

                    <div class="admin-panel">
                        <header class="admin-panel-header">
                            <div>
                                <h2>Operational Notes</h2>
                                <p>Summary of how the authentication system is performing.</p>
                            </div>
                        </header>

                        <p class="admin-notes">
                            Password hashing, session validation, and OTP flows continue to act as the core identity checks
                            across the product. This admin view helps track usage, detect friction points, and respond to
                            unusual authentication behavior quickly.
                        </p>
                    </div>
                </div>
            </section>
        </main>
        <?php include 'footer.php' ?>
    </div>
</body>

</html>