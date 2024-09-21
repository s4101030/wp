<!DOCTYPE HTML>
<!--
Week 7 - Assessment 2
Mattea Fotheringham 28/08/24
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
        <p class="centertext">You can add a new pet here</p>

        <form name="petinput" action=formlanding.php method="POST" enctype="multipart/form-data">
            <div class="tooltip"><label for="name">Pet Name:</label>
                <span class="tooltiptext">Enter pet name</span>
            </div> <br>
            <input type="text" id="name" name="name" placeholder="Provide a name for the pet" class="inputwidth"><br>

            <div class="tooltip"><label for="type">Type:</label>
                <span class="tooltiptext">Select type from list</span>
            </div><br>
            <select name="type" id="type" class="inputwidth">
                <option value="" selected disabled hidden>--Choose an option--</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="butterfly">Butterfly</option>
                <option value="other">Other</option>
            </select><br>

            <div class="tooltip"><label for="description">Description</label>
                <span class="tooltiptext">Enter a description of the pet</span>
            </div><br>
            <textarea id="description" name="description" class="inputwidth"
                placeholder="Describe the pet briefly"></textarea><br>

            <div class="tooltip"><label for="img">Select an Image:</label>
                <span class="tooltiptext">Select an image of the pet</span>
            </div>
            <input type="file" id="img" name="img" accept="image/*" enctype="multipart/form-data"><span class="maxsizewarn">Max image size:
                500px</span><br>

            <div class="tooltip"><label for="caption">Image Caption:</label>
                <span class="tooltiptext">Enter a caption for the uploaded image</span>
            </div><br>
            <input type="text" id="caption" name="caption" placeholder="Describe the image in one word"
                class="inputwidth"><br>

            <div class="tooltip"><label for="ageMonths">Age (months):</label>
                <span class="tooltiptext">Enter the age of the pet in months</span>
            </div><br>
            <input type="number" id="ageMonths" name="ageMonths" placeholder="Age of a pet in months"
                class="inputwidth"><br>

            <div class="tooltip"><label for="location">Location:</label>
                <span class="tooltiptext">Enter the location of the pet</span>
            </div><br>
            <input type="text" id="location" name="location" placeholder="Location of the pet"
                class="inputwidth"><br><br>

            <div class="center">

                <span class="submit topmargin10 pointer" onclick="petinput.submit()">
                    <span class="material-symbols-outlined white topmargin10 font14 pointer">
                        add_task
                    </span>
                    submit
                    <!-- <input type="submit" value="submit"> -->
                </span>

                <span class="reset topmargin10 pointer" onclick="petinput.reset()">
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