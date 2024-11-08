<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 20/09/24
-->

<?php
$title = "Register Landing";
require("include/header.inc");
require("include/db_connect.inc");
?>

<body>
    <?php
    require("include/nav.inc");
    ?>

    <header>
        <h3 class="centertext">Landing</h3>
    </header>

    <main>
        <div class="center centertext">
            <p><br><br>
                <?php
                $issues = array();
                $table = mysqli_query($conn, "select * from users");

                $found = false;
                $passhash = hash('sha1', $_POST['password']);
                while ($row = mysqli_fetch_array($table)) {
                    if ($row['username'] == $_POST["username"]) {
                        $passhash = $row['password'];
                        $found = true;
                        break;
                    }
                }
                if ($found == false) {
                    array_push($issues, "Username/password incorrect or does not exist.");
                } else {
                    if (!hash_equals($passhash, hash('sha1', $_POST['password']))) {
                        array_push($issues, "Username/password incorrect or does not exist.");
                    }
                }

                if (count($issues) > 0) {
                    echo "<b>Issues in form must be fixed before submission:</b><br>";
                    foreach ($issues as $issue) {
                        echo ">" . $issue . "<br>";
                    }
                    echo "<br><br><br>";
                } 
                else {
                    if (hash_equals($passhash, hash('sha1', $_POST['password']))) {
                        if(session_status() == PHP_SESSION_ACTIVE) {session_destroy();}
                        session_start();
                    $_SESSION['usrmsg'] = "Login successful";
                    $_SESSION['username'] = $_POST["username"];
                    $_SESSION['loginCheck'] = true;
                    echo "Logged in successfully<br><br><br><a href=./logout.php>Logout</a><br>";
                    header("Location:index.php");
                    }
                }
                
                ?>
                <a href="./index.php">Return home</a>
            </p>
        </div>
    </main>

    <?php
    require("include/footer.inc");
    ?>
</body>

</html>