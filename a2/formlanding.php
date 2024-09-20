<!DOCTYPE HTML>
<!--
Week 9 - Assessment 2
Mattea Fotheringham 20/09/24
-->

<?php
$title = "Add More";
require("include/header.inc"); 
require("include/db_connect.inc");
 ?>

<body>
    <?php
    require("include/nav.inc");
    ?>

    <header>
        <h3 class="centertext">Add a pet</h3>
    </header>

    <main>
        <div class="center">
            <p><br><br>
                <?php
            $issues = array();

                // print_r($_POST);
                // $table = mysqli_query($conn, "select * from pets");

                foreach($_POST as $key => $value) {

                    if (empty($value)) {
                        array_push($issues, $key . " is empty");
                    }
                }
                //other checks here
                $table = mysqli_query($conn, "select image from pets");
                while ($row = mysqli_fetch_array($table)) {
                    if ($row['petname'] == $_POST['img']) {
                        array_push($issues, "Image filename already exists on server, rename or choose another image");
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
                    $sql = "INSERT INTO country (petname,description,image,caption,age,location,type) VALUES(?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                   
                    $stmt->bind_param("ssssiss",$_POST['name'],$_POST['description'],$_POST['img'], $_POST['caption'], $_POST['ageMonths'], $_POST['location']);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        move_uploaded_file($_FILES['img']['tmp_name'], 'images/'.$_FILES['img']['name']);
                        echo "A new record has been created";
                    }                    

                }
            ?>
            <br><br><br><a href="javascript:history.go(-1)">Return to form</a>
            </p>
        </div>
    </main>

    <?php
    require("include/footer.inc");
    ?>
</body>

</html>