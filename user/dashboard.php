<?php session_start(); ?>
<?php
if (!isset($_SESSION['uname'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CTF Game - Capture the Flag!">
    <meta name="keywords" content="Cybersecurity, CTF, Capture the Flag, Hacking, Challenges">
    <meta name="author" content="Tanmay Naik">

    <title>Flag Nexus - Capture the Flag!</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="../style/dashboard.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="../assets/icon/favicon.ico" type="image/x-icon">

</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="../assets/images/logo.png" alt="CTF Logo">
            </div>
            <h1>
                <?php
                if (isset($_SESSION['uname'])) {
                    echo "
                    Hello, " . $_SESSION['uname'] . "
                    ";
                }
                ?>
            </h1>
            <nav>
                <ul>
                    <li><a href="#">Leaderboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <section class="hero">
            <h2 class="hero-title">Test Your Knowledge!</h2>
            <p class="hero-subtitle">Challenge yourself with this quick cybersecurity quiz!</p>

            <div class="card-container">
                <!-- First Question Block -->
                <div class="question-block">
                    <div class="question-text">
                        What is the capital of France?
                    </div>
                    <input type="text" class="answer-input" placeholder="Your answer">
                </div>

                <!-- Second Question Block -->
                <div class="question-block">
                    <div class="question-text">
                        Who developed the theory of relativity?
                    </div>
                    <input type="text" class="answer-input" placeholder="Your answer">
                </div>

                <!-- Third Question Block -->
                <div class="question-block">
                    <div class="question-text">
                        What is the largest planet in our solar system?
                    </div>
                    <input type="text" class="answer-input" placeholder="Your answer">
                </div>

                <!-- Submit Button -->
                <button class="submit-btn">Submit</button>
            </div>

        </section>



        <section class="features">
            <div class="feature">
                <h2>Challenges</h2>
                <p>Test your skills with various cybersecurity challenges, including web exploitation, cryptography, reverse engineering, and more.</p>
            </div>
            <div class="feature">
                <h2>Leaderboard</h2>
                <p>Compete with the best hackers around the world! Track your progress on the real-time leaderboard.</p>
            </div>
            <div class="feature">
                <h2>Community</h2>
                <p>Join our vibrant community of cybersecurity enthusiasts. Learn, share knowledge, and grow together.</p>
            </div>
        </section>

        <footer>
            <p>&copy; 2024 FLAG NEXUS. All Rights Reserved.</p>
            <p>Contact us: <a href="mailto:findtanmay10@gmail.com">findtanmay10@gmail.com</a></p>
        </footer>
    </div>
</body>

</html>