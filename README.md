# AuthFlow PHP Authentication UI

AuthFlow is a PHP authentication project that provides a clean multi-page user experience for common account flows. It includes screens for sign in, registration, password recovery, OTP verification, user profile access, and separate user/admin dashboards.

## Features

- Login and registration interfaces
- Forgot password and OTP verification flow
- User dashboard and admin dashboard
- Profile page and logout flow
- Responsive UI with dedicated styling for each major screen

## Tech Stack

- PHP
- HTML/CSS
- MySQL

## Local Setup

1. Place the project inside your local PHP server directory.
2. Start Apache and MySQL.
3. Create the project database.
4. Update the database credentials in the connection configuration if needed.
5. Run the project in your browser through your local server.

## Important Notes

- This project mainly focuses on the authentication UI and flow experience.
- Some screens may still require full backend integration and production-ready validation.
- Core areas that may need further implementation include OTP handling, password reset logic, session protection, and role-based access control.

## Suggested Next Steps

- Connect all forms to backend processing
- Add secure validation and error handling
- Protect dashboard pages with session-based authentication
- Implement role management for admin and user access
- Load real user data dynamically across authenticated pages
