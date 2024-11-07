<!-- footer.inc -->
<footer>
    <?php
    $table = mysqli_query($conn, "select * from users");
    $amount = mysqli_num_rows($table);
    // echo $amount;
    $currIndex = 0;
    while ($row = mysqli_fetch_array($table)) {
        $currIndex++;
        $username = $row['username'];
        print "<a href=\"user.php?user=$username\" class=\"user\">$username</a>";
        // class=\"$style\"
        if ($currIndex != $amount) {
            print " | ";
        }
    }
    ?>
    <p>Copywrite Mattea Fotheringham (s4101030). All Rights Reserved | Designed for Pets Victoria</p>
</footer>