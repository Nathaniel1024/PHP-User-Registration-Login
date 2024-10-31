# PHP-User-Registration-Login
Secure user registration and login system using PHP, MySQL, HTML, CSS, and JavaScript. Features password hashing for secure storage and verification, enabling users to create accounts and log in safely. Great for learning or as a base for applications needing user authentication.

This project is a secure, web-based user authentication system built with PHP, HTML, CSS, JavaScript, and MySQL. It includes a registration and login interface where users create an account with a username, password, and email address. Passwords are securely hashed before storage in the database and are verified during login for secure access.

## Features
- **User Registration**: Collects username, Gmail address, and password.
- **Password Security**: Passwords are hashed with PHP’s `password_hash()` function before database storage.
- **Login Verification**: Authenticates users by verifying hashed passwords with `password_verify()`.
- **Frontend Styling**: Clean and responsive design using HTML and CSS.
- **Database Interaction**: SQL/MYSQLi setup for user data storage and retrieval.
