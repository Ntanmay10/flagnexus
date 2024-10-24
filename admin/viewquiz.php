<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/viewquiz.css">
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
                    echo "Hello, " . $_SESSION['uname'] . "";
                }
                ?>
            </h1>
            <nav>
                <ul>
                    <li><a href="admin.php">Admin Panel</a></li>
                </ul>
            </nav>
        </header>

        <section class="hero">
            <h2 class="hero-title">Manage Questions</h2>
            <div class="card-container">
                <?php
                $con = mysqli_connect('localhost', 'root', '');
                mysqli_select_db($con, 'flagnexus');

                $query = "SELECT * FROM quiz";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='question-block'>
                        <div class='question-text'>$row[question]</div>
                        <form action='viewquiz.php' method='post'> 
                            <button class='submit-btn delete-btn' name='btndel'  value=" . $row['qid'] . ">Delete</button>
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

if (isset($_REQUEST['btndel'])) {
    $qid = $_REQUEST['btndel'];
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'flagnexus');
    $query = "DELETE FROM quiz WHERE qid = '$qid'";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<script>alert('Question deleted successfully')</script>";
        header('refresh:0');
    }
}

?>