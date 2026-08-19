🔐 Login & Registration System
A complete user authentication system built with PHP and MySQL. Features include secure login, user registration with validation, password hashing, session management, role-based access control, and a responsive modern interface with social media icons.

✨ Features
✅ User registration with validation

✅ Secure login with password verification

✅ Password hashing using bcrypt

✅ Session-based authentication

✅ Role-based access control (User/Admin)

✅ Admin and User dashboard pages

✅ Form validation with error handling

✅ Responsive design with animations

✅ Social media login icons (Google, Facebook, GitHub, LinkedIn)

✅ Logout functionality

🛠️ Tech Stack
Backend: PHP 7.4+

Database: MySQL 5.7+

Frontend: HTML5, CSS3, JavaScript

Icons: Font Awesome 6

Server: XAMPP/Apache

📋 Prerequisites
PHP 7.4 or higher

MySQL 5.7 or higher

XAMPP/WAMP/MAMP

Web browser

🔧 Installation
Step 1: Clone or Download
Clone the repository or download the files to your local server:

bash
git clone https://github.com/yourusername/login-registration-system.git
Place the project in your XAMPP htdocs folder:

text
C:\xampp\htdocs\login_register\
Step 2: Create Database
Open phpMyAdmin: http://localhost/phpmyadmin

Create a new database named register_login_db

Run the following SQL query:

sql
CREATE TABLE register_login_db (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
Step 3: Configure Database Connection
Update config.php with your database credentials:

php
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "register_login_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
Step 4: Run the Application
Start Apache and MySQL in XAMPP

Open your browser and navigate to:

text
http://localhost/login_register/
📁 Project Structure
text
login_register/
│
├── index.php              # Main login/registration page
├── config.php             # Database configuration
├── login_register.php     # Authentication handler
├── logout.php             # Logout functionality
├── admin_page.php         # Admin dashboard
├── user_page.php          # User dashboard
├── style.css              # Styling
├── script.js              # Frontend animations
└── README.md              # Documentation
👥 User Roles
Role	Access
User	Can access user_page.php
Admin	Can access admin_page.php
🔐 Authentication Flow
Registration: User submits form → PHP hashes password → Data stored in database

Login: User submits credentials → PHP verifies password → Session created → Redirect based on role

Authorization: Role check determines page access

Logout: Session destroyed → Redirect to login page

🛡️ Security Features
✅ Password hashing with password_hash() (bcrypt)

✅ Password verification with password_verify()

✅ Prepared statements (SQL injection prevention)

✅ Session-based authentication

✅ Role-based access control

✅ Input validation

✅ XSS protection with htmlspecialchars()

📱 Responsive Design
The application is fully responsive and works on:

💻 Desktop

📱 Tablets

📲 Mobile phones

🧪 Testing
Test Registration
Navigate to registration form

Fill in: Name, Email, Password, Role

Click Register

Check database for hashed password

Test Login
Enter registered email and password

Click Login

Verify correct dashboard redirection

Test Role-Based Access
User → Redirected to user_page.php

Admin → Redirected to admin_page.php

⚠️ Important Security Note
For production use: Do not allow public registration to select the admin role. Anyone could register as an administrator. Implement a separate admin creation process.

Recommended Fix
php
// In registration, force role to 'user'
$role = 'user'; // Instead of $_POST['role']
🚀 Next Improvements
□ Display error messages in the existing UI
□ Add server-side validation
□ Prevent public admin registration
□ Add "Remember Me" functionality
□ Implement password reset
□ Add CSRF protection
□ Implement OAuth (Google, GitHub login)
□ Add email verification
□ Improve error handling
🎯 Architecture
text
    FRONTEND               BACKEND              DATABASE
  ┌────────────┐       ┌────────────┐      ┌────────────┐
  │ HTML       │       │ PHP        │      │ MySQL      │
  │ CSS        │  ──→  │ Sessions   │  ──→ │ user_admin │
  │ JavaScript │       │ Auth       │      │ _db        │
  └────────────┘       └────────────┘      └────────────┘
🤝 Contributing
Contributions are welcome! Please feel free to submit a Pull Request.

Fork the repository

Create your feature branch (git checkout -b feature/AmazingFeature)

Commit your changes (git commit -m 'Add some AmazingFeature')

Push to the branch (git push origin feature/AmazingFeature)

Open a Pull Request

📄 License
This project is open source and available under the MIT License.

👤 Author
Your Name

GitHub: @yourusername

Email: your.email@example.com

🙏 Acknowledgments
Font Awesome for icons

PHP community for excellent documentation

XAMPP for local development environment

📧 Contact
For any inquiries, please email: adamelkt96@gmail.com

⭐ If you found this project helpful, please give it a star! ⭐

