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
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

            <p class="register-link">Don't have an account? <a href="register.php">Register here</a>.</p>

            <!-- Back to Home button -->
            <a href="../index.php" class="home-btn">Back to Home</a>
        </div>
    </div>
</body>
</html>
