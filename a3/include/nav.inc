<!-- nav.inc -->
<nav>
    <div class="navdiv">
        <!-- Nav & Header rearranged & header used as the main content title under teacher consult -->
        <img src="images/logo.png" alt="Logo" class="logo">
        <!-- <select name="navigation" id="navigation" onchange="dropdownDirect()">
            <option value="" selected disabled hidden>Select an option...</option>
            <option value="home">Home</option>
            <option value="pets">Pets</option>
            <option value="add">Add more</option>
            <option value="gallery">Gallery</option>
        </select>  -->
        
<?php
$navElementsCommon = array(
    "Home"=>"index.php", 
    "Pets"=>"pets.php", 
    "Gallery"=>"gallery.php"
);
$navElementsLoggedOut = array(
    "Register"=>"register.php",
    "Login"=>"login.php"
);
$navElementsLoggedIn = array(
    "Add more"=>"add.php",
    "Logout"=>"logout.php"
);

    if(isset($_SESSION['loginCheck'])) {
        $navElements = array_merge($navElementsCommon, $navElementsLoggedIn);
    }
    else {
        $navElements = array_merge($navElementsCommon, $navElementsLoggedOut);
    }

    foreach ($navElements as $key => $value) {
        if (basename($_SERVER['PHP_SELF']) == $value) {
            $style = "selected";
        }
        else {
            $style = "normal";
        }
        
        print "<a href=\"$value\" class=\"$style\">$key</a>";
    }

?>
        <input class="seperation right" type="text" placeholder="Search">
        <span class="material-symbols-outlined topmargin10 white marginleft">
            search
        </span>
    </div>
</nav>