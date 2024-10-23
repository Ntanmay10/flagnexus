<?php 
session_start(); 
if (!isset($_SESSION['uname'])) {
    header("location:login.php");
    exit();
}

// Connect to database
$con = mysqli_connect('localhost', 'root', '', 'flagnexus');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
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
                    echo "Hello, " . htmlspecialchars($_SESSION['uname'], ENT_QUOTES, 'UTF-8');
                }
                ?>
            </h1>
            <nav>
                <ul>
                    <li><a href="../leadboard.php">Leaderboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <section class="hero">
            <h2 class="hero-title">Test Your Knowledge!</h2>
            <p class="hero-subtitle">Challenge yourself with this cybersecurity quiz!</p>
            <div class="card-container">
                <?php
                $query = "SELECT * FROM quiz";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $qid = htmlspecialchars($row['qid'], ENT_QUOTES, 'UTF-8');
                    $question = htmlspecialchars($row['question'], ENT_QUOTES, 'UTF-8');
                    echo "
                    <div class='question-block'>
                        <div class='question-text'>$question</div>
                        <form action='dashboard.php' method='post'>
                            <input type='hidden' name='qid' value='$qid'> <!-- Hidden field for the question ID -->
                            <input type='text' class='answer-input' name='answer' placeholder='Your answer' required>
                            <button class='submit-btn' name='btnsub'>Submit</button>
                        </form>
                    </div>
                    ";
                }
                ?>
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

if (isset($_POST['btnsub'])) {
    $qid = $_POST['qid']; // Get the question ID from the hidden input
    $uid = $_SESSION['uid']; // Get user ID from the session
    $answer = trim($_POST['answer']); // Get the user's answer from the form

    // Check if the user has already answered this question
    $checkAnsweredQuery = "SELECT * FROM user_answers WHERE uid='$uid' AND qid='$qid'";
    $checkAnsweredResult = mysqli_query($con, $checkAnsweredQuery);

    if (mysqli_num_rows($checkAnsweredResult) > 0) {
        // User has already answered this question
        echo "<script>alert('You have already answered this question!')</script>";
    } else {
        // Check if the answer is correct
        $query = "SELECT * FROM quiz WHERE qid='$qid' AND answer='" . mysqli_real_escape_string($con, $answer) . "'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            // Correct answer, so update the user's score in the leaderboard
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
            echo "<script>alert('Incorrect answer! Please try again.')</script>";
        }
    }

    header("Refresh: 0"); // Refresh the page to clear form submission
}
?>
