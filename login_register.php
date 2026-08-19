<?php

session_start();
require_once 'config.php';


// =========================
// REGISTER
// =========================

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];


    // Check if email already exists
    $stmt = $conn->prepare(
        "SELECT email FROM register_login_table WHERE email = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();


    if ($result->num_rows > 0) {

        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';

    } else {

        // Insert new user
        $stmt = $conn->prepare(
            "INSERT INTO register_login_table (name, email, password, role)
             VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "ssss",
            $name,
            $email,
            $password,
            $role
        );

        $stmt->execute();
    }

    header("Location: index.php");
    exit();
}


// =========================
// LOGIN
// =========================

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    // Find user by email
    $stmt = $conn->prepare(
        "SELECT * FROM register_login_table WHERE email = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();


    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();


        // Verify password
        if (password_verify($password, $user['password'])) {

            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];


            // Redirect based on role
            if ($user['role'] === 'admin') {

                header("Location: admin_page.php");

            } else {

                header("Location: user_page.php");
            }

            exit();
        }
    }


    // Login failed
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = 'login';

    header("Location: index.php");
    exit();
}

?>