<!DOCTYPE HTML>
<!--
Week 12 - Assessment 3
Mattea Fotheringham 28/08/24
-->

<?php
$title = "home";
require("include/header.inc");
require("include/db_connect.inc"); // placed here to show connection issues on launch 
?>

<body class="index">
  <?php
  require("include/nav.inc");
  ?>

  <header>
    <h1 class="index">

      <!-- <img src="images/dog4.jpeg" alt="Main image" class="frontimage main"> -->
      <div id="carouselExample" class="carousel slide carouselWidth">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>


        <?php
        $table = mysqli_query($conn, "select * from pets");

        $petImages = array();



        while ($row = mysqli_fetch_array($table)) {

          // if ($fullrows < $num+1){}   
          $image = $row['image'];
          array_push($petImages, $image);
        }

        $finalIndex = count($petImages) - 1;
        $imageOne = $petImages[$finalIndex];
        $imageTwo = $petImages[$finalIndex - 1];
        $imageThree = $petImages[$finalIndex - 2];

        print <<<AAA
<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/$imageOne" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/$imageTwo" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/$imageThree" class="d-block w-100" alt="...">
    </div>
  </div>
AAA;
        ?>
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

  <main class="index mainwhite">
    <form name="search" action="search.php" method="post">
      <div class="centercontent">
        <input type="text" id="term" name="term" class="termsearch" placeholder="I am looking for ...">
        <!-- <input type="password" id="type" name="type" placeholder="" class="registerwidth"><br> -->
        <select name="type" id="type" class="matchinput">
          <option value="" selected disabled hidden>Select your pet type</option>
          <option value="">All types</option>
          <option value="dog">Dog</option>
          <option value="cat">Cat</option>
          <option value="butterfly">Butterfly</option>
          <option value="other">Other</option>
        </select>
        </span>
        <!-- <span onclick="search.submit()" class="material-symbols-outlined topmargin10 black marginleft borderaround">
          search
        </span> -->
        <button class="bluebg edit" onclick="search.submit()">Search</button>
      </div>
    </form>

    <div class="centercontent">
      <div class="indextext">
      <h3 class="indextext">Discover Pets Victoria</h3>
      <p class="indextext">Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focused on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organization offers a range of services, including adoption counseling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals. </p>
      </div>
    </div>
  </main>


  <?php
  require("include/footer.inc");
  ?>
</body>

</html>