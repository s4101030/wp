<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 28/08/24
-->

<?php
$title = "Pets";
require("include/header.inc");
require("include/db_connect.inc") ?>

<body>
    <?php
    require("include/nav.inc");
    ?>

    <header>
        <h3 class="centertext">Discover Pets Victoria</h3>
    </header>

    <main>
        <p class="centertext">Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia,
            focused on providing a
            save and loving environment vor pets in need. With a
            compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs. cats, and
            other animals. Their mission is to connect these
            deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a
            range of services, including adoption counseling, pet
            education, and community support programs, all aimed at promoting responsible pet ownership and reducing the
            number of homeless animals.</p>
        <br>
        <img class="pets" src="images/pets.jpeg" alt="A picture of various cats and dogs running together in a field.">

        <table class="pets">
            <tr>
                <th>Pet</th>
                <th>Type</th>
                <th>Age</th>
                <th>Location</th>
            </tr>
            <?php
            $table = mysqli_query($conn, "select * from pets");
            while ($row = mysqli_fetch_array($table)) {
                $id = $row['petid'];
                print "<tr>";
                print  "<td><u><a href=\"./details.php?id=$id\">" . $row['petname'] . "</a></u></td>";
                print  "<td>" . $row['type'] . "</td>";
                print  "<td>" . $row['age'] . " Months</td>";
                print  "<td>" . $row['location'] . "</td>";
                print "</tr>";
            }
            ?>
        </table>

    </main>

    <?php
    require("include/footer.inc");
    ?>
</body>

</html>