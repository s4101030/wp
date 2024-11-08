<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 21/09/24
-->

<?php
$title = "Details";
require("include/header.inc"); 
require("include/db_connect.inc");
 ?>

<body>
    <?php
    require("include/nav.inc");
    ?>

<?php
    $id = $_GET['id'];
    $table = mysqli_query($conn, "select * from pets WHERE petid=$id");
    $age;
    $name;
    $type;
    $description;
    $location;
            while ($row = mysqli_fetch_array($table)) {
                $name = $row['petname'];
                $type = $row['type'];
                $age = $row['age'];
                $location = $row['location'];
                $description = $row['description'];
                $image = $row['image'];
            }
?>

    <header>
        <div class="clearfix">

            <!-- <div class="centercontent"> -->
                <?php
                print "<img alt=\"Image of the pet\" src=\"images/$image\" class=\"detailimage\">";
                ?>
            <!-- </div> -->
            <div class="">
                <?php
                print "<h3>$name</h3>";
                print "<p>$description</p>";
                ?>
            </div>
        </div>

        <div class="flex">

            <br>
            <div class="centertext detail">
                <span class="material-symbols-outlined grey font30">alarm</span>
                <?php
                 print "<p class=\"topmargin5\">$age months</p>"
                ?>
            </div>

            <div class="centertext detail">
                <span class="material-symbols-outlined grey font30">pets</span>
                <?php
                 print "<p class=\"topmargin5\">$type</p>"
                ?>
            </div>
            <div class="centertext detail">
                <span class="material-symbols-outlined grey font30">location_on</span>
                <?php
                 print "<p class=\"topmargin5\">$location</p>"
                ?>
            </div>
        </div>
    </header>

    <main>

    <?php
        if(isset($_SESSION['loginCheck'])) {
            echo "<button class=\"edit\" onclick=\"toEdit($id)\">Edit</button>";
            echo "<button class=\"delete\" onclick=\"confirmRedirect($id)\">Delete</button>";
        }
        else {
            echo "<p>Log in to edit or delete records</p>";
        }
    ?>

    </main>

    <?php
    require("include/footer.inc");
    ?>
</body>

</html>