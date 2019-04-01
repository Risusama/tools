<?php
echo $_POST['name'];
//echo $_POST['geoloc'];
//$geoloc2 = $_POST['geoloc'];
header("Location: https://www.ebay.com/sch/i.html?_from=R40&_trksid=m570.l1313&_nkw=" . $_POST['name']);
?>

