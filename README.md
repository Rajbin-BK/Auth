# Auth

PHP User Registration and Login System with Salted Password Hashing
This project demonstrates a secure user registration and login system implemented in PHP. It uses salted password hashing to store passwords securely in a MySQL database and ensures protection against common security threats like SQL injection.

Features
User Registration: Allows new users to register with their first name, last name, city, country, email, and password. Passwords are securely hashed using SHA256 with a unique salt for each user.

User Login: Provides a login mechanism where users can authenticate using their registered email and password. Password verification is done by hashing the input password with the stored salt and comparing it with the stored hashed password.

Session Management: Utilizes PHP sessions to maintain user login state across different pages once authenticated.

Secure Database Interaction: Uses PDO (PHP Data Objects) for database connectivity, which helps prevent SQL injection attacks through parameterized queries.

Files Overview
process-registration.php: Handles the registration form submission, validates input data, generates a random salt for password hashing, hashes the password using SHA256 with the salt, and stores user data securely in the database.

login-form-salt.php: Provides the login form where users can enter their credentials. On submission, it verifies the entered password by hashing it with the stored salt and comparing it with the hashed password retrieved from the database.

config.inc.php: Configuration file containing database connection details (e.g., host, database name, username, password). This file is included in both registration and login scripts.

Installation and Usage
Database Setup:

Ensure you have a MySQL database set up.
Modify config.inc.php with your database connection details (DBHOST, DBNAME, DBUSER, DBPASS).
Registration:

Access registration-form-salt.php through your web browser.
Fill in the registration form with required details and submit.
Upon successful registration, you will be redirected to the login page.
Login:

Access login-form-salt.php through your web browser.
Enter your registered email and password.
Upon successful login, you will be redirected to the home page (home-page.php).
Session Management:

Sessions are used to keep users logged in across different pages until they log out.
Security Considerations
Password Hashing: Passwords are hashed using SHA256 with a unique salt for each user, making them resistant to rainbow table attacks.

SQL Injection Prevention: PDO and prepared statements are used to interact with the database, preventing SQL injection vulnerabilities.

Session Security: PHP sessions are managed securely to prevent session hijacking and fixation.

Technologies Used
PHP: Backend scripting language for server-side logic.
MySQL: Database system for storing user information securely.
PDO: PHP Data Objects for secure database connectivity and SQL operations.
HTML/CSS: Frontend components and styling.
Credits
This project template was created based on educational resources and best practices in web development.
