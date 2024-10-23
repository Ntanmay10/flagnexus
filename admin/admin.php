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
    <link rel="stylesheet" href="../style/landing.css">
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
                    <li><a href="../leadboard.php">Leadboard</a></li>
                    <li><a href="../user/logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <section class="hero">
            <div class="hero-text">
                <h1>Add new CTF Questions</h1>
                <div class="card-container">
                    <!-- First Question Block -->
                    <form action="admin.php" method="post">
                        <div class="question-block">
                            <input type="text" name="question" class="answer-input" placeholder="Question">
                            <input type="text" name="answer" class="answer-input" placeholder="Answer">
                        </div>
                        <!-- Submit Button -->
                        <button class="submit-btn" name="btnadd">Add</button>
                    </form>
                </div>
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

<?php
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'flagnexus');

if (isset($_REQUEST['btnadd'])) {
    $question = $_REQUEST['question'];
    $answer = $_REQUEST['answer'];

    $chk = "select * from quiz where question='$question' AND answer='$answer'";
    $t = mysqli_query($con, $chk);
    if (mysqli_num_rows($t) > 0) {
        echo "<script>alert('Question duplication detected')</script>";
    } else {
        $sql = "INSERT INTO quiz (question, answer) VALUES ('$question', '$answer')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("refresh:0");
        }
    }
}

?>