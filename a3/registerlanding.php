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

                while ($row = mysqli_fetch_array($table)) {
                    if ($row['username'] ==  $_POST["username"]) {
                        array_push($issues, "Username already in use! Please use another!");
                        break;
                    }
                }
                


                if (count($issues) > 0) {
                    echo "<b>Issues in form must be fixed before submission:</b><br>";
                    foreach ($issues as $issue) {
                        echo ">" . $issue . "<br>";
                    }
                }
                else {
                    // when there are no issues
                    $sql = "INSERT INTO users (username,password,reg_date) VALUES(?, ?, ?)";
                    $stmt = $conn->prepare($sql);

                    date_default_timezone_set('Australia/Melbourne');
                    $currdatetime = date("Y-m-d H:i:s");

                   $hash = hash('sha1', $_POST['password']);
                   
                    $stmt->bind_param("sss",$_POST['username'],$hash,$currdatetime);

                    $stmt->execute();

                    // print_r($_FILES);
                    if ($stmt->affected_rows > 0) {
                        session_start();
                        $_SESSION['usrmsg'] = "Registration successful";
                        $_SESSION['username'] = $_POST["username"];
                        $_SESSION['loginCheck'] = true;
                        echo "Registered successfully<br><br><br><a href=./login.php>Login</a><br>";
                        header("Location:index.php");
                        }                  
                    else {
                        echo "<br><br><br>";
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