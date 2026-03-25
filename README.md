# AuthFlow PHP Authentication UI

AuthFlow is a simple PHP-based authentication project with a modern multi-page interface for user access, recovery, OTP verification, and dashboard experiences.

## Overview

This project includes a clean authentication flow inspired by a shared landing-page design system. It currently focuses on frontend page structure and styling for:

- Landing page
- Login page
- Registration page
- Forgot password page
- OTP verification page
- User dashboard
- Admin dashboard

Each major page has its own dedicated stylesheet to keep the UI modular and easy to maintain.

## Pages

- `index.php`
  Landing page with authentication-system overview.

- `login.php`
  Login screen with email and password.

- `register.php`
  Registration screen with name, email, password, phone, address, and photo upload.

- `forgot.php`
  Password reset page with new password and confirm password fields.

- `otp.php`
  OTP verification page for secure code entry.

- `dashboard.php`
  User dashboard with account summary, recent activity, and quick actions.

- `admin_dashboard.php`
  Admin dashboard with authentication metrics, event table, and security overview.

## CSS Structure

All page styles are separated into the `components` folder:

- `components/landing.css`
  Shared landing-page design language.

- `components/login.css`
  Login page styling.

- `components/register.css`
  Registration page styling.

- `components/forgot.css`
  Forgot password page styling.

- `components/otp.css`
  OTP page styling.

- `components/user-dashboard.css`
  User dashboard styling.

- `components/admin-dashboard.css`
  Admin dashboard styling.

## Project Structure

```text
Simple crud/
├── admin_dashboard.php
├── dashboard.php
├── forgot.php
├── index.php
├── login.php
├── logout.php
├── otp.php
├── profile.php
├── register.php
├── connection/
│   └── connect.php
├── components/
│   ├── admin-dashboard.css
│   ├── forgot.css
│   ├── landing.css
│   ├── login.css
│   ├── otp.css
│   ├── register.css
│   └── user-dashboard.css
├── favicon/
├── uploads/
└── README.md
```

## Local Setup

1. Place the project inside your local PHP server directory such as `htdocs` if you use XAMPP.
2. Start Apache and MySQL.
3. Create your database for the project.
4. Update `connection/connect.php` with your local database settings if needed.
5. Open the project in the browser:

```text
http://localhost/Simple%20crud/
```

## Design Notes

- The UI uses a consistent visual style across all authentication pages.
- Each page has separate CSS for easier customization.
- The layout is responsive for desktop and mobile screens.
- The current design emphasizes clarity, spacing, soft cards, and blue gradient accents.

## Important Note

Some pages currently act as styled frontend screens and may still need full backend integration for:

- registration submission
- forgot password handling
- OTP generation and validation
- role-based redirection between user and admin dashboards
- profile management and dynamic user data

## Next Improvements

- Connect all forms to real PHP processing logic
- Add session-based authentication checks on dashboards
- Add admin and user role management
- Load real user details dynamically on dashboards
- Add validation messages and success/error alerts

## Author

Built as a simple PHP authentication project with a custom AuthFlow UI.
