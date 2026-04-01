<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - AuthFlow</title>
    <link rel="shortcut icon" href="favicon/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="components/otp.css">
</head>

<body>
    <div class="otp-shell">
        <header class="otp-navbar">
            <a class="otp-brand" href="index.php" aria-label="AuthFlow home">
                <img src="img/logo.png" alt="AuthFlow logo" class="otp-brand-logo">
                <span>AuthFlow</span>
            </a>
            <a href="login.php" class="otp-back-link">← Back to Login</a>
        </header>

        <main class="otp-main">
            <div class="otp-layout">
                <!-- Left Panel -->
                <div class="otp-copy-panel">
                    <span class="otp-badge">Two-Factor Verification</span>
                    <h1>One-Time Password Verification</h1>
                    <p>
                        We've sent a 6-digit code to your registered email address.
                        This code verifies your identity and ensures secure access to your account.
                    </p>

                    <div class="otp-feature-list">
                        <div class="otp-feature-item">
                            <h3>Quick Verification</h3>
                            <p>Enter the OTP sent to your email within 10 minutes</p>
                        </div>

                        <div class="otp-feature-item">
                            <h3>Enhanced Security</h3>
                            <p>Multi-factor authentication protects your account from unauthorized access</p>
                        </div>

                        <div class="otp-feature-item">
                            <h3>Easy Recovery</h3>
                            <p>Didn't receive the code? Request a new one with just one click</p>
                        </div>
                    </div>
                </div>

                <!-- Right Panel - OTP Form -->
                <div class="otp-form-panel">
                    <div class="otp-card-glow"></div>
                    <div class="otp-form-card">
                        <div class="otp-form-header">
                            <div>
                                <span class="otp-kicker">Verification</span>
                                <h2>Enter OTP Code</h2>
                                <p class="otp-intro">Check your email for the 6-digit code we sent</p>
                            </div>
                        </div>

                        <form class="otp-form" method="POST" action="">
                            <div class="otp-inputs-container">
                                <input
                                    type="text"
                                    class="otp-input"
                                    maxlength="1"
                                    placeholder="0"
                                    inputmode="numeric"
                                    required
                                    aria-label="OTP digit 1">
                                <input
                                    type="text"
                                    class="otp-input"
                                    maxlength="1"
                                    placeholder="0"
                                    inputmode="numeric"
                                    required
                                    aria-label="OTP digit 2">
                                <input
                                    type="text"
                                    class="otp-input"
                                    maxlength="1"
                                    placeholder="0"
                                    inputmode="numeric"
                                    required
                                    aria-label="OTP digit 3">
                                <input
                                    type="text"
                                    class="otp-input"
                                    maxlength="1"
                                    placeholder="0"
                                    inputmode="numeric"
                                    required
                                    aria-label="OTP digit 4">
                                <input
                                    type="text"
                                    class="otp-input"
                                    maxlength="1"
                                    placeholder="0"
                                    inputmode="numeric"
                                    required
                                    aria-label="OTP digit 5">
                                <input
                                    type="text"
                                    class="otp-input"
                                    maxlength="1"
                                    placeholder="0"
                                    inputmode="numeric"
                                    required
                                    aria-label="OTP digit 6">
                            </div>

                            <button type="submit" class="otp-submit-btn">Verify OTP</button>

                            <div class="otp-timer">
                                <span class="otp-timer-label">Expires in:</span>
                                <span class="otp-timer-value">10:00</span>
                            </div>

                            <div class="otp-footer-links">
                                <p class="otp-footer-text">
                                    Didn't receive the code?
                                    <button type="button" class="otp-resend-btn">Resend OTP</button>
                                </p>
                                <a href="login.php" class="otp-footer-link">Back to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'footer.php' ?>
    </div>
</body>

</html>