<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - CTF Game</title>

    <!-- Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Link to CSS -->
    <link rel="stylesheet" href="../style/login.css">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h1>Login</h1>
            <p>Log in to continue your journey in the CTF Game!</p>

            <form action="login.php" method="post" class="login-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="passwd" required>
                </div>

                <button type="submit" class="btn" name="btnlog">Login</button>
            </form>

            <p class="register-link">Don't have an account? <a href="register.php">Register here</a>.</p>

            <!-- Back to Home button -->
            <a href="../index.php" class="home-btn">Back to Home</a>
        </div>
    </div>
</body>

</html>

<?php
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'flagnexus');

if (isset($_REQUEST['btnlog'])) {
    $email = $_REQUEST['email'];
    $passwd = $_REQUEST['passwd'];

    $sql = "select * from registration where email='$email' and passwd='$passwd'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['usertyp'] == 'Admin') {
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['uname'] = 'Admin';
            header('location:../admin/admin.php');
        } else {
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['uname'] = $row['uname'];
            header('location:dashboard.php');
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>