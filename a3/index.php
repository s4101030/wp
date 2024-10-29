<!DOCTYPE HTML>
<!--
Week 7 - Assessment 2
Mattea Fotheringham 28/08/24
-->

<?php
$title = "home";
require("include/header.inc"); 
require("include/db_connect.inc"); // placed here to show connection issues on launch ?>

<body class="index">
    <?php
    require("include/nav.inc");
    ?>

    <header>
        <h1 class="index">
            
        <!-- <img src="images/dog4.jpeg" alt="Main image" class="frontimage main"> -->
        
        <div id="carouselExample" class="carousel slide carouselWidth">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/dog4.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/dog3.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/dog2.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

        PETS VICTORIA
        </h1>
        <h2 class="index">
            WELCOME TO PET<br>
            ADOPTION</h2>
    </header>

    <main class="index">
        <!-- No main content to add -->
    </main>


    <?php
    require("include/footer.inc");
    ?>
</body>

</html>