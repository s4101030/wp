<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 28/08/24
-->

<?php
$title = "Gallery";
require("include/header.inc"); ?>

<body>
    <?php
    require("include/nav.inc");
    require("include/db_connect.inc");
    ?>

    <header>
        <h3 class="centertext">Pets Victoria has a lot to offer!</h3>
    </header>

    <main>
        <p class="centertext">For almost two decades, Pets Victoria has helped in creating true social change by
            bringing pet adoption into the mainstream. Our work has helped make a
            difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation.
            But, until every pet is safe, respected, and loved, we all
            still have big, hairy work to do.</p>
        <div class="centercontent">
            <select name="type" id="typeselector" class="matchinput" onchange="typeselect()">
                <option value="" selected disabled hidden>Pet type</option>
                <option value="">All types</option>
                <?php
                $typesarray = mysqli_query($conn, "SELECT DISTINCT type FROM `pets`");
                while ($rowtypes = mysqli_fetch_array($typesarray)) {
                    $typeinst = $rowtypes['type'];
                    $typeinstUp = ucfirst($typeinst);
                    print "<option value=\"$typeinst\">$typeinstUp</option>";
                }
                ?>
            </select>
        </div>
        <br>

        <table class="gallery">
            <?php
            // get row in table
            // modulus 3
            // subtract modulus from total
            // total is number of full rows
            // modulus must be one or two
            // therefore if there is a modulus there must be a minimum of one, and an if for the two            

            $table = mysqli_query($conn, "select * from pets");

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
                $type = $row['type'];


                print <<<AAA
                        <td>
                            <div class="gallerydiv" data-type="$type">
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