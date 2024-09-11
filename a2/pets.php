<!DOCTYPE HTML>
<!--
Week 7 - Assessment 2
Mattea Fotheringham 28/08/24
-->

<?php
$title = "Pets";
require("include/header.inc"); ?>

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
            <tr>
                <td>Milo</td>
                <td>Cat</td>
                <td>3 months</td>
                <td>Melbourne CBD</td>
            </tr>
            <tr>
                <td>Baxter</td>
                <td>Dog</td>
                <td>5 months</td>
                <td>Cape Woolamai</td>
            </tr>
            <tr>
                <td>Luna</td>
                <td>Cat</td>
                <td>1 month</td>
                <td>Ferntree Gully</td>
            </tr>
            <tr>
                <td>Willow</td>
                <td>Dog</td>
                <td>48 months</td>
                <td>Marysville</td>
            </tr>
            <tr>
                <td>Oliver</td>
                <td>Cat</td>
                <td>12 months</td>
                <td>Grampians</td>
            </tr>
            <tr>
                <td>Bella</td>
                <td>Dog</td>
                <td>10 months</td>
                <td>Carlton</td>
            </tr>
        </table>

    </main>

    <?php
    require("include/footer.inc");
    ?>
</body>

</html>