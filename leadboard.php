<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard - CTF Game</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- CSS Link -->
    <link rel="stylesheet" href="style/leadboard.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="assets/images/logo.png" alt="CTF Logo">
            </div>
            <h1>Leaderboard</h1>
            <nav>
                <ul>
                    <?php
                    // Check if the session variable 'uname' is set and is equal to 'Admin'
                    if (isset($_SESSION['uname']) && $_SESSION['uname'] === 'Admin') {
                        // If the user is Admin, link to admin.php
                        echo '<li><a href="admin/admin.php">Admin Panel</a></li>';
                    } else {
                        // For regular users, link to the dashboard
                        echo '<li><a href="user/dashboard.php">Dashboard</a></li>';
                    }
                    ?>
                </ul>

            </nav>
        </header>

        <section class="leaderboard-section">
            <h2>Top Players</h2>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Username</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $con = mysqli_connect('localhost', 'root', '');
                    mysqli_select_db($con, 'flagnexus');
                    $query = "SELECT * FROM leadboard ORDER BY score DESC";
                    $result = mysqli_query($con, $query);
                    $rank = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $query2 = "SELECT * from registration where `uid`='$row[uid]'";
                        $result2 = mysqli_query($con, $query2);
                        while ($row2 = mysqli_fetch_array($result2)) {
                            echo "<tr>
                            <td>{$rank}</td>
                            <td>" . $row2['uname'] . "</td>
                            <td>" . $row['score'] . "</td>
                            </tr>";
                        }
                        $rank++;
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <footer>
            <p>&copy; 2024 FLAG NEXUS. All Rights Reserved.</p>
        </footer>
    </div>
</body>

</html>