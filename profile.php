<?php
session_start();

include 'connection/connect.php';

if (!isset($_SESSION['id'])) {
    header("Location:index.php");
    exit();
}


$stmt = $conn->prepare("SELECT * From users WHERE id=?");
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo $data['photo'];
$user_photo = $data['photo'] ? 'uploads/' . $data['photo'] : 'img/default-profile.png';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | AuthFlow</title>
    <link rel="shortcut icon" href="favicon/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="components/profile.css">
</head>

<body>
    <div class="profile-shell">
        <header class="profile-navbar">
            <a class="profile-brand" href="index.php" aria-label="AuthFlow home">
                <img src="img/logo.png" alt="AuthFlow logo" class="profile-brand-logo">
                <span>AuthFlow</span>
            </a>

            <nav class="profile-navlinks">
                <a href="dashboard.php">Dashboard</a>
                <a href="logout.php" class="profile-signout-btn">Sign Out</a>
            </nav>
        </header>

        <main class="profile-main">
            <section class="profile-hero">
                <div class="profile-hero-copy">
                    <span class="profile-badge">User Profile</span>
                    <h1>Manage your identity, photo, and account details from one polished workspace.</h1>
                    <p>
                        This profile page follows the same visual direction as the AuthFlow landing experience while
                        giving users a clearer place to personalize their account, keep details updated, and stay in
                        control of profile security.
                    </p>

                    <div class="profile-hero-actions">
                        <a href="#profile-form" class="profile-primary-btn">Update Details</a>
                        <a href="#photo-panel" class="profile-secondary-btn">Change Photo</a>
                    </div>
                </div>

                <aside class="profile-highlight-card">
                    <p class="profile-card-eyebrow">Account Snapshot</p>
                    <div class="profile-highlight-top">
                        <div class="profile-highlight-avatar">
                            <img src="<?= htmlspecialchars($user_photo, ENT_QUOTES, 'UTF-8') ?>" alt="Current profile photo" id="profilePreview">
                        </div>
                        <div>
                            <h2>Rohan Raj</h2>
                            <p>Verified member with personalized dashboard access.</p>
                        </div>
                    </div>

                    <div class="profile-highlight-stats">
                        <div>
                            <span>Completion</span>
                            <strong>92%</strong>
                        </div>
                        <div>
                            <span>Email Status</span>
                            <strong>Verified</strong>
                        </div>
                        <div>
                            <span>Security</span>
                            <strong>Strong</strong>
                        </div>
                    </div>
                </aside>
            </section>

            <section class="profile-overview-grid">
                <article class="profile-overview-card">
                    <span>Personalization</span>
                    <h3>Profile Photo</h3>
                    <p>Upload a cleaner display image to make your account instantly recognizable across the dashboard.</p>
                </article>

                <article class="profile-overview-card">
                    <span>Account Data</span>
                    <h3>Editable User Info</h3>
                    <p>Maintain your name, email, phone number, and address so your profile always stays current.</p>
                </article>

                <article class="profile-overview-card">
                    <span>Trust</span>
                    <h3>Security Awareness</h3>
                    <p>Keep an eye on recent changes and verification signals to protect access to your account.</p>
                </article>
            </section>

            <section class="profile-content-grid">
                <section class="profile-panel profile-editor-panel" id="profile-form">
                    <div class="profile-panel-heading">
                        <div>
                            <span class="profile-mini-badge">Profile Editor</span>
                            <h2>Update your account details</h2>
                        </div>
                        <p>Use the form below to keep your personal information accurate and ready for secure authentication flows.</p>
                    </div>

                    <form action="#" method="post" class="profile-form" enctype="multipart/form-data">
                        <div class="profile-form-grid">
                            <div class="profile-field">
                                <label for="full_name">Full Name</label>
                                <input type="text" id="full_name" name="full_name" value="Rohan Raj" placeholder="Enter your full name" required>
                            </div>

                            <div class="profile-field">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="rohan@example.com" placeholder="you@example.com" required>
                            </div>
                        </div>

                        <div class="profile-form-grid">
                            <div class="profile-field">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="+91 98765 43210" placeholder="Enter your phone number" required>
                            </div>

                            <div class="profile-field">
                                <label for="dob">Date of Birth</label>
                                <input type="date" id="dob" name="dob" value="2002-06-14">
                            </div>
                        </div>

                        <div class="profile-form-grid">
                            <div class="profile-field">
                                <label for="role">Account Role</label>
                                <input type="text" id="role" name="role" value="User" readonly>
                            </div>

                            <div class="profile-field">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" value="Kolkata" placeholder="Enter your city">
                            </div>
                        </div>

                        <div class="profile-field profile-field-wide">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" rows="5" placeholder="Enter your address" required>Salt Lake Sector V, Kolkata, West Bengal</textarea>
                        </div>

                        <div class="profile-field profile-field-wide">
                            <label for="bio">Short Bio</label>
                            <textarea id="bio" name="bio" rows="4" placeholder="Tell us a little about yourself">Productive AuthFlow user focused on secure login, a clean profile, and smooth account management.</textarea>
                        </div>

                        <div class="profile-actions-row">
                            <button type="submit" class="profile-primary-btn">Save Profile Changes</button>
                            <button type="reset" class="profile-secondary-btn">Reset Form</button>
                        </div>
                    </form>
                </section>

                <aside class="profile-sidebar">
                    <section class="profile-panel profile-photo-panel" id="photo-panel">
                        <div class="profile-panel-heading">
                            <div>
                                <span class="profile-mini-badge">Photo Update</span>
                                <h2>Change profile photo</h2>
                            </div>
                            <p>Upload a clear square image for the best result across profile and dashboard cards.</p>
                        </div>

                        <form action="#" method="post" enctype="multipart/form-data" class="profile-photo-form">
                            <label class="profile-photo-dropzone" for="photoUpload">
                                <span class="profile-photo-icon">+</span>
                                <strong>Choose a new photo</strong>
                                <small>PNG, JPG, or WEBP supported</small>
                            </label>
                            <input type="file" id="photoUpload" name="photo" accept="image/*">

                            <div class="profile-photo-meta">
                                <div>
                                    <span>Current Photo</span>
                                    <strong>default-profile.png</strong>
                                </div>
                                <div>
                                    <span>Recommended</span>
                                    <strong>1:1 ratio</strong>
                                </div>
                            </div>

                            <button type="submit" class="profile-primary-btn profile-full-btn">Upload New Photo</button>
                        </form>
                    </section>

                    <section class="profile-panel profile-security-panel">
                        <div class="profile-panel-heading">
                            <div>
                                <span class="profile-mini-badge">Account Status</span>
                                <h2>Security and activity</h2>
                            </div>
                            <p>Helpful signals that reassure the user their account is active and protected.</p>
                        </div>

                        <div class="profile-security-list">
                            <article>
                                <div>
                                    <h3>Email Verified</h3>
                                    <p>Your login email is confirmed and trusted for authentication.</p>
                                </div>
                                <span class="profile-status success">Active</span>
                            </article>

                            <article>
                                <div>
                                    <h3>OTP Protection</h3>
                                    <p>One-time password verification is available for stronger access control.</p>
                                </div>
                                <span class="profile-status info">Ready</span>
                            </article>

                            <article>
                                <div>
                                    <h3>Recent Update</h3>
                                    <p>Your personal information can be refreshed here whenever details change.</p>
                                </div>
                                <span class="profile-status neutral">Today</span>
                            </article>
                        </div>
                    </section>
                </aside>
            </section>
        </main>
        <?php include 'footer.php' ?>
    </div>

</body>

</html>