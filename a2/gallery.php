<!DOCTYPE HTML>
<!--
Week 7 - Assessment 2
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

        <table class="gallery">
            <tr>
                <td>
                    <div class="gallerydiv">
                        <div class="container">
                            <img class="gallery image" src="images/cat1.jpeg" alt="">
                            <div class="middle">
                                <div class="text"><span class="material-symbols-outlined topmargin10 grey">
                                        search
                                    </span><br>Discover_more</div>
                            </div>
                        </div>
                        <div class="galleryspacer">Milo</div>
                    </div>
                </td>
                <td>
                    <div class="gallerydiv">
                        <div class="container">
                            <img class="gallery image" src="images/dog1.jpeg" alt="">
                            <div class="middle">
                                <div class="text"><span class="material-symbols-outlined topmargin10 grey">
                                        search
                                    </span><br>Discover_more</div>
                            </div>
                        </div>
                        <div class="galleryspacer">Baxter</div>
                    </div>
                </td>
                <td>
                    <div class="gallerydiv">
                        <div class="container">
                            <img class="gallery image" src="images/cat2.jpeg" alt="">
                            <div class="middle">
                                <div class="text"><span class="material-symbols-outlined topmargin10 grey">
                                        search
                                    </span><br>Discover_more</div>
                            </div>
                        </div>
                        <div class="galleryspacer">Luna</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="gallerydiv">
                        <div class="container">
                            <img class="gallery image" src="images/dog2.jpeg" alt="">
                            <div class="middle">
                                <div class="text"><span class="material-symbols-outlined topmargin10 grey">
                                        search
                                    </span><br>Discover_more</div>
                            </div>
                        </div>
                        <div class="galleryspacer">Willow</div>
                    </div>
                </td>
                <td>
                    <div class="gallerydiv">
                        <div class="container">
                            <img class="gallery image" src="images/cat4.jpeg" alt="">
                            <div class="middle">
                                <div class="text"><span class="material-symbols-outlined topmargin10 grey">
                                        search
                                    </span><br>Discover_more</div>
                            </div>
                        </div>
                        <div class="galleryspacer">Oliver</div>
                    </div>
                </td>
                <td>
                    <div class="gallerydiv">
                        <div class="container">
                            <img class="gallery image" src="images/dog3.jpeg" alt="">
                            <div class="middle">
                                <div class="text"><span class="material-symbols-outlined topmargin10 grey">
                                        search
                                    </span><br>Discover_more</div>
                            </div>
                        </div>
                        <div class="galleryspacer">Bella</div>
                    </div>
                </td>
            </tr>
        </table>

        <!-- IMAGES HERE -->
    </main>

    <?php
    require("include/footer.inc");
    ?>

</body>

</html>