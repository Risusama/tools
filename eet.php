<?php
echo $_POST['name'];
echo $_POST['geoloc'];
$geoloc2 = $_POST['geoloc'];
header("Location: https://{$geoloc2}.eetgroup.com/search?query=" . $_POST['name']);
?>

