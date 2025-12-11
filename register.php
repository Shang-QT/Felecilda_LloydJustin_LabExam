<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = $_POST["fullname"];
    $email    = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // load existing users
    $users = file_exists("users.json") ? json_decode(file_get_contents("users.json"), true) : [];

    // add new user
    $users[$username] = [
        "fullname" => $fullname,
        "email" => $email,
        "password" => $password // NOT hashed (simple version)
    ];

    // save back to file
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

        <img src='CCE.png' class='logo'>

        <form method="POST">

            <label>Fullname</label>
            <input type="text" name="fullname" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button class="main-btn">Register</button>
        </form>

        <p class="footer-text">Have an account? <a href="login.php">Sign In</a></p>

    </div>
</div>

</body>
</html>
