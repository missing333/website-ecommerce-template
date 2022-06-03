<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
    ob_start();
    // include header.php file
    include ('header.php');
?>

<?php

    /*  include banner area  */
        include ('Template/_banner-area.php');
    /*  include banner area  */

    /*  include special price section  */
         include ('Template/_all-items.php');
    /*  include special price section  */

    /*  include banner ads  */
        include ('Template/_banner-ads.php');
    /*  include banner ads  */

    /*  include new phones section  */
        include ('Template/_new-items.php');
    /*  include new phones section  */

    /*  include top sale section */
        include ('Template/_top-sale.php');
    /*  include top sale section */

    /*  include blog area  */
         include ('Template/_blogs.php');
    /*  include blog area  */

?>


<?php
// include footer.php file
include ('footer.php');
?>

</html>
