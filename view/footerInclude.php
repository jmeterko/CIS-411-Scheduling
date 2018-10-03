</section>			<!-- End of section id='main' -->
<footer id="mainFooter" class="clickable">
    <?php
    date_default_timezone_set('America/New_York');
    echo("&copy JSVD Industries ".Date('F Y')." | ");      //php for loading current date, month/year
    ?>

    <?php
    $filename = __FILE__;
    if (file_exists($filename)) {
        echo " | This page was last updated on " . date ("F d Y", filemtime($filename));
    }
    ?>
</footer>
</div>					<!-- End of wrapper -->
</body>
</html>
