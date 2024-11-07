<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 20/09/24
-->

<?php
$title = "Edit Landing";
require("include/header.inc");
require("include/db_connect.inc");
?>

<body>
    <?php
    require("include/nav.inc");
    ?>

    <header>
        <h3 class="centertext">Edit Landing</h3>
    </header>

    <main>
        <div class="center centertext">
            <p><br><br>
                <?php
                $issues = array();

                // print_r($_POST);
                // $table = mysqli_query($conn, "select * from pets");
                // print_r(mysqli_fetch_array($table));

                foreach ($_POST as $key => $valuFe) {
                    if (empty($value)) {
                        array_push($issues, $key . " is empty");
                    }
                }
                //other checks here
                $table = mysqli_query($conn, "select * from pets");

                $id = $_POST['petId'];

                $stmt = $conn->prepare("SELECT * FROM pets WHERE petid = ? LIMIT 1");
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $stmt->bind_result($retreivedID, $petname, $description, $image, $caption, $age, $location, $type, $username);
                $stmt->fetch();
                $stmt->close();

                // echo "$retreivedID, $petname, $description, $image, $caption, $age, $location, $type, $username";

                // echo $_FILES['img']['name'];
                $moveimage = !empty($_FILES['img']['name']);
                if (!empty($_FILES['img']['name'])) {
                    while ($row = mysqli_fetch_array($table)) {
                        if ($row['petname'] == $_FILES['img']['name']) {
                            array_push($issues, "Image filename already exists on server, rename or choose another image");
                            break;
                        }
                    }
                    $imageData = $_FILES['img']['name'];
                    unlink("images/$image");
                } else {
                    $imageData = $image;
                }
                // echo $image;
                // echo $imageData;

                if (!isset($_POST['type'])) {
                    $typedata = $type;
                } else {
                    try {
                        $typedata = $_POST['type'];
                    } catch (Exception $e) {
                    }
                }

                if (count($issues) > 0) {
                    echo "<b>Issues in form must be fixed before submission:</b><br>";
                    foreach ($issues as $issue) {
                        echo ">" . $issue . "<br>";
                    }
                } else {
                    // when there are no issues
                    $sql = "UPDATE pets 
                        SET petname=?,description=?,image=?,caption=?,age=?,location=?,type=?,username=? WHERE petid = ?";
                    $stmt = $conn->prepare($sql);

                    // echo is_null($_POST['name']).is_null($_POST['description']).is_null($imageData).is_null($_POST['caption']).is_null($_POST['ageMonths']).is_null($_POST['location']).is_null($_POST['type']).is_null($_SESSION['username']);

                    $stmt->bind_param("ssssisssi", $_POST['name'], $_POST['description'], $imageData, $_POST['caption'], $_POST['ageMonths'], $_POST['location'], $typedata, $_SESSION['username'], $id);
                    $stmt->execute();

                    // print_r($_FILES);

                    if ($stmt->affected_rows > 0) {
                        if ($moveimage) {
                            move_uploaded_file($_FILES['img']['tmp_name'], 'images/' . $_FILES['img']['name']);
                        }
                        echo "Record has been updated";
                    } else {
                        echo "Record not updated";
                    }
                }
                ?>
                <br><br><br><a href="pets.php">Return to Pets</a>
            </p>
        </div>
    </main>

    <?php
    require("include/footer.inc");
    ?>
</body>

</html>