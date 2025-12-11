<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = $_POST["fullname"];
    $email    = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = file_exists("users.json") ? json_decode(file_get_contents("users.json"), true) : [];

    $users[$username] = [
        "fullname" => $fullname,
        "email" => $email,
        "password" => $password
    ];

    file_put_contents("users.json", json_encode($users));

    echo "<script>alert('Registered Successfully!'); window.location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>

<div class="container">
    <div class="form-box">

        <img src="CCE.png" class="logo">

        <h2 class="title">Create Account</h2>

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

            <button class="main-btn">Register</button>
        </form>

        <p class="footer-text">Already have an account? <a href="login.php">Sign In</a></p>

    </div>
</div>

</body>
</html>
