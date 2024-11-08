<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 28/08/24
-->

<?php
$title = "Search";
require("include/header.inc"); ?>

<body>
    <?php
    require("include/nav.inc");
    require("include/db_connect.inc");
    ?>

    <header>
        <h3 class="centertext">Search</h3>
    </header>

    <main>
        <p class="centertext">Search for pet based on text in the name or description, and/or by type</p>

        <form name="search" action="search.php" method="post">
      <div class="centercontent bottommargin10">
        <input type="text" id="term" name="term" class="termsearch" placeholder="Term to search for ...">
        <!-- <input type="password" id="type" name="type" placeholder="" class="registerwidth"><br> -->
        <select name="type" id="type" class="matchinput">
          <option value="" selected disabled hidden>Pet type</option>
          <option value="">All types</option>
          <option value="dog">Dog</option>
          <option value="cat">Cat</option>
          <option value="butterfly">Butterfly</option>
          <option value="other">Other</option>
        </select>
        </span>
        <!-- <span onclick="search.submit()" class="material-symbols-outlined topmargin10 black marginleft borderaround">
          search
        </span> -->
        <button class="bluebg edit" onclick="search.submit()">Search</button>
      </div>
    </form>


        <table class="gallery">
            <?php
            // get row in table
            // modulus 3
            // subtract modulus from total
            // total is number of full rows
            // modulus must be one or two
            // therefore if there is a modulus there must be a minimum of one, and an if for the two

            // print_r($_POST);

            if (isset($_POST['term'])) {
                $term = $_POST['term'];
            } else {
                $term;
            }

            if (isset($_POST['type'])) {
                $type = $_POST['type'];
            } else {
                $type;
            }

            if (!empty($term) && !empty($type)) {
                // print("both");
                $term = "%" . $term . "%";
                // if searching both term and type
                $stmt = $conn->prepare("SELECT * FROM pets WHERE (petname LIKE ? OR description LIKE ?) AND (type=?)");
                $stmt->bind_param("sss", $term, $term, $type);
            } elseif (!empty($term)) {
                // print("term");
                $term = "%" . $term . "%";
                // if searching only term
                $stmt = $conn->prepare("SELECT * FROM pets WHERE (petname LIKE ? OR description LIKE ?)");
                $stmt->bind_param("ss", $term, $term);
            } elseif (!empty($type)) {
                // print("type");
                // if searching only type
                $stmt = $conn->prepare("SELECT * FROM pets WHERE type=?");
                $stmt->bind_param("s", $type);
            } else {
                // print("none");
                $stmt = $conn->prepare("SELECT * FROM pets");
            }
            $stmt->execute();
            $table = $stmt->get_result();

            // $table = mysqli_query($conn, $sql); // <-- MODIFY THIS WITH SEARCH STUFF

            // Gallery code reused for display

            $totalrows = mysqli_num_rows($table);
            $remainder = $totalrows % 3;
            $fullrows = $totalrows - $remainder;

            $num = 0;
            $closed = true;
            while ($row = mysqli_fetch_array($table)) {

                $num++;
                if ($closed) {
                    print "<tr>";
                    $closed = false;
                }

                // if ($fullrows < $num+1){}   
                $image = $row['image'];
                $name = $row['petname'];
                $id = $row['petid'];


                print <<<AAA
                        <td>
                            <div class="gallerydiv">
                                <div class="container">
                                    <img class="gallery image" src="images/$image" alt="">
                                    <div class="middle">
                                        <div class="text"><span class="material-symbols-outlined topmargin10 grey">
                                                search
                                            </span><br><u><a href="./details.php?id=$id">Discover_more</a></u></div>
                                    </div>
                                </div>
                                <div class="galleryspacer">$name</div>
                            </div>
                        </td>
                    AAA;


                if ($num % 3 == 0 || $num == $totalrows) {
                    print "</tr>";
                    $closed = true;
                }
            }
            ?>
        </table>
    </main>

    <?php
    require("include/footer.inc");
    ?>

</body>

</html>