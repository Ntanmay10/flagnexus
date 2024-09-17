<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register - CTF Game</title>

    <!-- Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Link to CSS -->
    <link rel="stylesheet" href="../style/register.css">
</head>

<body>
    <div class="register-container">
        <div class="register-box">
            <h1>Register</h1>
            <p>Sign up for the CTF Game and start your cybersecurity journey!</p>

            <form action="register.php" method="post" class="register-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="uname" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="passwd" required>
                </div>

                <button type="submit" class="btn" name="btnreg">Register</button>
            </form>

            <p class="login-link">Already have an account? <a href="login.php">Login here</a>.</p>

            <!-- Back to Home button -->
            <a href="../index.php" class="home-btn">Back to Home</a>
        </div>
    </div>
</body>

</html>

<?php
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'flagnexus');

if (isset($_REQUEST['btnreg'])) {
    $uname = $_REQUEST['uname'];
    $email = $_REQUEST['email'];
    $passwd = $_REQUEST['passwd'];

    $chk = "select * from registration where email='$email' or uname='$uname'";
    $t = mysqli_query($con, $chk);
    if (mysqli_num_rows($t) > 0) {
        echo "<script>alert('Username or Email already exists')</script>";
    } else {
        $sql = "INSERT INTO registration (uname, email, passwd) VALUES ('$uname', '$email','$passwd')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("location:login.php");
        }
    }
}

?>