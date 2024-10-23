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
            <p class="hero-subtitle">Challenge yourself with this cybersecurity quiz!</p>
            <form action="dashboard.php" method="post">
                <div class="card-container">
                    <?php
                    $con = mysqli_connect('localhost', 'root', '');
                    $db = mysqli_select_db($con, 'flagnexus');
                    $query = "SELECT * FROM quiz";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "
                    <div class='question-block'>
                    <div class='question-text'>
                    $row[question]
                    </div>
                    <input type='text' class='answer-input' name='answer' placeholder='Your answer'>
                    <button class='submit-btn' name='btnsub' value='$row[qid]'>Submit</button>
                    </div>
                    ";
                    }
                    ?>
                </div>
            </form>

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
$db = mysqli_select_db($con, 'flagnexus');

if (isset($_REQUEST['btnsub'])) {
    # code...
    $qid = $_REQUEST['btnsub'];
    $uid = $_SESSION['uid'];
    $answer = $_REQUEST['answer'];

    $query = "select * from quiz where qid='$qid' and answer='$answer'";
    $result = mysqli_query($con, $query);

    $checkAnsweredQuery = "SELECT * FROM user_answers WHERE uid='$uid' AND qid='$qid'";
    $checkAnsweredResult = mysqli_query($con, $checkAnsweredQuery);

    if (mysqli_num_rows($checkAnsweredResult) > 0) {
        // User has already answered this question
        echo "<script>alert('You have already answered this question!')</script>";
    } else {
        // Check if the answer is correct
        $query = "SELECT * FROM quiz WHERE qid='$qid' AND answer='$answer'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            // Correct answer, so update the user's score in the leaderboard

            // First, insert a record into user_answers to mark the question as answered
            $insertAnswer = "INSERT INTO user_answers (uid, qid) VALUES ('$uid', '$qid')";
            mysqli_query($con, $insertAnswer);

            // Check if the user exists in the leaderboard
            $leaderboardQuery = "SELECT * FROM leadboard WHERE uid='$uid'";
            $leaderboardResult = mysqli_query($con, $leaderboardQuery);

            if (mysqli_num_rows($leaderboardResult) > 0) {
                // User exists, update the score by adding 10 points
                $updateScore = "UPDATE leadboard SET score = score + 10 WHERE uid='$uid'";
                mysqli_query($con, $updateScore);
            } else {
                // User doesn't exist, insert a new record with a score of 10
                $insertUser = "INSERT INTO leadboard (uid, score) VALUES ('$uid', 10)";
                mysqli_query($con, $insertUser);
            }

            echo "<script>alert('Correct! Your score has been updated.')</script>";
        } else {
            // Incorrect answer, show an alert
            echo "<script>alert('Heyy foolish hacker, go learn more')</script>";
        }
    }
    header("Refresh: 0");
}
?>