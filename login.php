<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = $_POST["fullname"];
    $email    = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = file_exists("users.json") ? json_decode(file_get_contents("users.json"), true) : [];

    if (isset($users[$username]) && 
        $users[$username]["password"] === $password &&
        $users[$username]["fullname"] === $fullname &&
        $users[$username]["email"] === $email) {

        $_SESSION["fullname"] = $fullname;

        echo "<script>
                alert('Login Successful!');
                window.location='welcome.php';
              </script>";
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>

<div class="container">
    <div class="form-box">

        <img src="CCE.png" class="logo">

        <h2 class="title">Welcome TROJANS</h2>

        <form method="POST">

            <div class="input-group">
                <label>Fullname</label>
                <input type="text" name="fullname" required>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="options">
                <a href="#">Forgot Password?</a>
            </div>

            <button class="main-btn">Log In</button>
        </form>

        <p class="footer-text">Don't have an account? <a href="register.php">Register</a></p>

    </div>
</div>

</body>
</html>
