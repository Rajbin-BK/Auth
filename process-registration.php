<?php

include 'config.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user data from the registration form
    $first = $_POST['first'];
    $last = $_POST['last'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input (add more validation as needed)
    if (empty($first) || empty($last) || empty($city) || empty($country) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    // Generate a random salt
    $salt = bin2hex(random_bytes(16));

    // Hash the password using bcrypt
    $bcryptHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    // Insert user data into the database
    try {
        $pdo = new PDO(...$connectionDetails);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare
        ("
            INSERT INTO users (email, firstname, lastname, city, country, password, salt)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([$email, $first, $last, $city, $country, $bcryptHash, $salt]);

        // After a successful registration
        $_SESSION['logged_in'] = true;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_firstname'] = $first;
        $_SESSION['user_lastname'] = $last;
        $_SESSION['user_city'] = $city;
        $_SESSION['user_country'] = $country;


        // Redirect to the login page
        header('Location: login-form-bcrypt.php?registration=success');
        exit();
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to the registration form if accessed without form submission
    header('Location: registration-form-bcrypt.php');
    exit();
}
?>

