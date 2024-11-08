<!-- nav.inc -->
<nav>
    <?php
        echo "<div class=\"navdiv";
        if (basename($_SERVER['PHP_SELF']) == "index.php") {
            echo " width1200";
        }
        echo "\">";
    ?>
        <!-- Nav & Header rearranged & header used as the main content title under teacher consult -->
        <img src="images/logo.png" alt="Logo" class="logo">
        <!-- <select name="navigation" id="navigation" onchange="dropdownDirect()">
            <option value="" selected disabled hidden>Select an option...</option>
            <option value="home">Home</option>
            <option value="pets">Pets</option>
            <option value="add">Add more</option>
            <option value="gallery">Gallery</option>
        </select>  -->
        <span class="vert10">

            <?php
            $navElementsCommon = array(
                "Home" => "index.php",
                "Pets" => "pets.php",
                "Gallery" => "gallery.php"
            );
            $navElementsLoggedOut = array(
                "Register" => "register.php",
                "Login" => "login.php"
            );
            $navElementsLoggedIn = array(
                "Add more" => "add.php",
                "Logout" => "logout.php"
            );

            session_start();
            if (isset($_SESSION['loginCheck'])) {
                $navElements = array_merge($navElementsCommon, $navElementsLoggedIn);
            } else {
                $navElements = array_merge($navElementsCommon, $navElementsLoggedOut);
            }

            foreach ($navElements as $key => $value) {
                if (basename($_SERVER['PHP_SELF']) == $value) {
                    $style = "selected";
                } else {
                    $style = "normal";
                }

                print "<a href=\"$value\" class=\"$style\">$key</a>";
            }
            ?>
        </span>
        <form name="navsearch" action="search.php" method="post" class="inline">
            <div class="inlineSearch">
                <input class="right" type="text" name="term" placeholder="Search">
                <span onclick="navsearch.submit()" class="material-symbols-outlined topmargin10 white marginleft">
                    search
                </span>
            </div>
        </form>
    </div>

    <?php
    if (isset($_SESSION['usrmsg'])) {
        $message = $_SESSION['usrmsg'];
        echo "<div class=\"msg\"><p class=\"msg\">$message</p>
            <span class=\"material-symbols-outlined font14 inline\" onclick=\"window.location.reload();\">
                    close
                    </span>
            </div>";
        unset($_SESSION['usrmsg']);
    }
    ?>
</nav>