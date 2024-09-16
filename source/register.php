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
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="btn">Register</button>
            </form>

            <p class="login-link">Already have an account? <a href="login.php">Login here</a>.</p>

            <!-- Back to Home button -->
            <a href="../index.php" class="home-btn">Back to Home</a>
        </div>
    </div>
</body>
</html>
