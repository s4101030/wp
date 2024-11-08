<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 28/08/24
-->

<?php
$title = "Edit";
require("include/header.inc");
require("include/db_connect.inc");
?>

<body>
    <?php
    require("include/nav.inc");
    require("include/db_connect.inc");

    if (!isset($_SESSION['loginCheck'])) {
        $_SESSION['usrmsg'] = "Error! You must be logged in to access the edit page!";
        header("Location:index.php");
    }

    $id = $_POST['petId'];
    
    $stmt = $conn->prepare("SELECT * FROM pets WHERE petid = ? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();


    $stmt->bind_result($retreivedID, $petname, $description, $image, $caption, $age, $location, $type, $username);
    $stmt->fetch()
    // // echo "$retreivedID, $petname, $description, $image, $caption, $age, $location, $type, $username";
    // }
    ?>

    <header>
        <h3 class="centertext">Edit record</h3>
    </header>

    <main>
        <?php
        echo "<p class=\"centertext\">Edit record of $petname, ID #$retreivedID</p>"
        ?>

        <form name="petinput" action=editlanding.php method="POST" enctype="multipart/form-data">
            <label for="name">Pet Name:</label>
            <div class="tooltip">
                <span class="tooltiptext">Enter pet name</span>
            </div> <br>

            <?php
                    echo "<input type=\"text\" id=\"name\" name=\"name\" placeholder=\"Provide a name for the pet\" value=\"$petname\" class=\"inputwidth\"><br>";
            ?>

            <label for="type">Type:</label>
            <div class="tooltip">
                <span class="tooltiptext">Select type from list</span>
            </div><br>
            <select name="type" id="type" class="inputwidth">
                <?php
                        echo "<option value=\"$type\" selected disabled hidden>$type</option>";
                ?>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="butterfly">Butterfly</option>
                <option value="other">Other</option>
            </select><br>

            <label for="description">Description</label>
            <div class="tooltip">
                <span class="tooltiptext">Enter a description of the pet</span>
            </div><br>
            <?php
                    echo "<textarea id=\"description\" name=\"description\" class=\"inputwidth\" placeholder=\"Describe the pet briefly\">$description</textarea><br>";
            ?>
            <label for="img">Select an Image:</label>
            <div class="tooltip">
                <span class="tooltiptext">Select an image of the pet</span>
            </div>
            <?php
                    echo "<p class=\"bottommargin0\">Current image in use:</p>";
                    echo "<img class=\"editing\" src=\"images/$image\" alt=\"\"><br>";
                ?>
            <input type="file" id="img" name="img" accept="image/*"><span class="maxsizewarn">Max image size:
                500px</span><br>

            <label for="caption">Image Caption:</label>
            <div class="tooltip">
                <span class="tooltiptext">Enter a caption for the uploaded image</span>
            </div><br>
            <?php
                        echo "<input type=\"text\" id=\"caption\" name=\"caption\" placeholder=\"Describe the image in one word\" class=\"inputwidth\" value=\"$caption\"><br>";        
                ?>

            <label for="ageMonths">Age (months):</label>
            <div class="tooltip">
                <span class="tooltiptext">Enter the age of the pet in months</span>
            </div><br>
            <?php
                    echo "<input type=\"number\" id=\"ageMonths\" name=\"ageMonths\" placeholder=\"Age of a pet in months\" class=\"inputwidth\" value=\"$age\"><br>";
                ?>

            <label for="location">Location:</label>
            <div class="tooltip">
                <span class="tooltiptext">Enter the location of the pet</span>
            </div><br>
            <?php
                        echo "<input type=\"text\" id=\"location\" name=\"location\" placeholder=\"Location of the pet\"
                        class=\"inputwidth\" value=\"$location\"><br><br>";        
                ?>
            <div class="center">

                <span class="submit topmargin10 pointer" onclick="petinput.submit()">
                    <span class="material-symbols-outlined white topmargin10 font14 pointer">
                        add_task
                    </span>
                    submit
                    <!-- <input type="submit" value="submit"> -->
                </span>

                <span class="reset topmargin10 pointer" onclick="petinput.reset()">
                    <span class="material-symbols-outlined blue topmargin10 font14 pointer">
                        close
                    </span>
                    clear
                    <!-- <input type="reset" value="clear"> -->
                </span>
            </div>
            <?php
                echo "<input type=\"hidden\" name=\"petId\" value=\"$id\">";
                $stmt->close();
            ?>
        </form>
        <br>
    </main>

    <?php
    require("include/footer.inc");
    ?>
</body>

</html>