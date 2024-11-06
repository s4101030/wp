<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 28/08/24
-->

<?php
$title = "Logout";
require("include/header.inc"); ?>

<body>
    <?php
    require("include/nav.inc");
    require("include/db_connect.inc");
    ?>

    <header>
        <h3 class="centertext">Logout</h3>
    </header>

    <main>
        <p class="centertext">Logging out... </p>

        <?php
            session_unset();
            header("Location:index.php");
            $_SESSION['usrmsg'] = "Logout successful";

        ?>

    </main>

    <?php
    require("include/footer.inc");
    ?>

</body>

</html>