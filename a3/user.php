<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 21/09/24
-->

<?php
$title = "User";
require("include/header.inc");
require("include/db_connect.inc");
?>

<body>
    <?php
    require("include/nav.inc");
    ?>

    <header>
        <?php
        $user = $_GET['user'];
        print "<h3 class=\"topmargin10\">$user's Collection</h3>";
        ?>
    </header>

    <main>
        <?php
        $stmt = $conn->prepare("SELECT * FROM pets WHERE username = ?");
        $stmt->bind_param("s", $user); // "s" denotes a string parameter
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['petid'];
            $name = $row['petname'];
            $type = $row['type'];
            $age = $row['age'];
            $location = $row['location'];
            $description = $row['description'];
            $image = $row['image'];


            echo "<div class=\"clearfix\">";
            print "<img alt=\"Image of the pet\" src=\"images/$image\" class=\"userimage\">";
            echo "<div class=\"\">";
            print "<h3>$name</h3>";
            print "<p>$description</p>";
            echo "</div></div>";
            echo "<div class=\"flex\">
        <br>
        <div class=\"centertext detail\">
            <span class=\"material-symbols-outlined grey font30\">alarm</span>";
            print "<p class=\"topmargin5\">$age months</p>";
            echo "</div>";
            echo "<div class=\"centertext detail\">
        <span class=\"material-symbols-outlined grey font30\">pets</span>";
            print "<p class=\"topmargin5\">$type</p>";
            echo "</div>";
            echo "        <div class=\"centertext detail\">
            <span class=\"material-symbols-outlined grey font30\">location_on</span>";
            print "<p class=\"topmargin5\">$location</p>";
            echo "</div></div>";

            if (isset($_SESSION['loginCheck'])) {
                echo "<button class=\"edit\" onclick=\"toEdit($id)\">Edit</button>";
                echo "<button class=\"delete\" onclick=\"confirmRedirect($id)\">Delete</button>";
            } else {
                echo "<p>Log in to edit or delete records</p>";
            }
        }
        ?>
    </main>

    <?php
    require("include/footer.inc");
    ?>
</body>

</html>