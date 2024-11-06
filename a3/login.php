<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 28/08/24
-->

<?php
$title = "Login";
require("include/header.inc"); ?>

<body>
    <?php
    require("include/nav.inc");
    require("include/db_connect.inc");
    ?>

    <header>
        <h3 class="centertext">Login</h3>
    </header>

    <main>
        <p class="centertext">Login to your Pets Victoria account.
        </p>

        <form name="loginInput" action="loginlanding.php" method="post">
            <div class="register">

                <label for="name">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Name" class="registerwidth" required><br>

                <label for="name">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="" class="registerwidth" required><br>
            </div>
            <br>
            <div class="center">

                <span class="submit topmargin10 pointer" onclick="loginInput.submit()">
                    <span class="material-symbols-outlined white topmargin10 font14 pointer">
                        add_task
                    </span>
                    submit
                    <!-- <input type="submit" value="submit"> -->
                </span>

                <span class="reset topmargin10 pointer" onclick="loginInput.reset()">
                    <span class="material-symbols-outlined blue topmargin10 font14 pointer">
                        close
                    </span>
                    clear
                    <!-- <input type="reset" value="clear"> -->
                </span>
            </div>

        </form>

    </main>

    <?php
    require("include/footer.inc");
    ?>

</body>

</html>