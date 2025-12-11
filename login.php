<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = file_exists("users.json") ? json_decode(file_get_contents("users.json"), true) : [];

    if (isset($users[$username]) && $users[$username]["password"] === $password) {
        
        $_SESSION["fullname"] = $users[$username]["fullname"];

        echo "<script>
                alert('Login Successful!');
                window.location='welcome.php';
              </script>";
    } else {
        echo "<script>alert('Invalid username or password');</script>";
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

        <img src='CCE.png' class='logo'>

        <form method="POST">

            <label>Fullname</label>
            <input type="text" name="fullname">

            <label>Email</label>
            <input type="email" name="email">

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

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
