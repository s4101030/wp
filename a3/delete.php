<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 28/08/24
-->

<?php
$title = "Delete";
require("include/header.inc"); ?>

<body>
    <?php
    require("include/nav.inc");
    require("include/db_connect.inc");

    if (!isset($_SESSION['loginCheck'])) {
        $_SESSION['usrmsg'] = "Error! You must be logged in to access the delete page!";
        header("Location:index.php");
    }
    ?>

    <header>
        <h3 class="centertext">Delete</h3>
    </header>

    <main>
        <p class="centertext">Deleting record... </p>

        <?php
        $id = $_POST['petId'];
        // print_r($_POST);
        $table = mysqli_query($conn, "select * from pets");
        while ($row = mysqli_fetch_array($table)) {
            if ($row["petid"] == $id) {
                // echo "found row<br>";
                $image = $row['image'];
                // $name = $row['petname'];
                // $id = $row['petid'];

                break;
            }
        }

        unlink("images/$image");
        // echo "image deleted<br>";

        $stmt = $conn->prepare("DELETE FROM pets WHERE petid=?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        // echo "sql executed<br>";

        if ($stmt->affected_rows > 0) {
            $_SESSION['usrmsg'] = "Record deleted successfully";
            echo "row effected<br>";
        }
        else {
            $_SESSION['usrmsg'] = "Error in deletion";
            // echo "row NOT effected<br>";
        }

        header('Location:pets.php');
        // echo "redirect<br>";
        ?>

    </main>

    <?php
    require("include/footer.inc");
    ?>

</body>

</html>