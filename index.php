<!DOCTYPE HTML>  
<html>
<head>
  <title>Catalog Search Tools</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<div id="content1" class="content"><?php
require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();
//locate the IP
$geoplugin->locate();

$geoloc = "{$geoplugin->countryCode}";

$ccFI = '<pre>Tämä sivusto (eet.debexel.eu) ja / tai sen muut verkkotunnukset eivät ole millään tavalla sidoksissa EET Europartsiin ja / tai sen muihin toimijoihin.
Tämän työkalun tarkoitus on kehittää omaa PHP-osaamistani sekä yksinkertaistaa (ja mahdollisesti myös nopeuttaa) hakujen tekemistä EET Europartsin katalogista </pre>';

$ccEN = '<pre>This site (eet.debexel.eu) and / or its other domains are not affiliated in any way with EET Europarts, and / or its other businesses.
    This tool was created as part of my PHP-training and also to simplify (and possibly to speed up) searching from EET Europarts catalog.</pre>';

/* define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9a-zA-Z- ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/
?>

<h2>Search from EET Europarts' catalog</h2>
<form method="post" action="eet.php">  
	Search for: <input type="text" name="name" value="<?php echo $name;?>" autofocus>
	<input type="hidden" name="geoloc" value="<?php echo $geoloc;?>">
	<br><br>
	<input type="submit" name="submit" value="Submit">  
</form>
</div>

<hr />
<div id="content2" class="content hidden">
<h2>Search from eBay's catalog</h2>
<form method="post" action="ebay.php">  
	Search for: <input type="text" name="name" value="<?php echo $name;?>">
	<br><br>
	<input type="submit" name="submit" value="Submit">  
</form>
</div>
<div id="content3" class="content hidden"></div>
<hr />
<!-- <button onclick="show(1)">Show 1</button>
<button onclick="show(2)">Show 2</button>
<button onclick="show(3)">Show 3</button> -->


<div>
    </br>
    <?php if ($geoloc == "FI") {
                    echo $ccFI;
                    }
                else {
                            echo $ccEN;
                    }?>
</div>
<?php
echo "Country Code: {$geoplugin->countryCode} <br />";
//echo "<script>window.open('$name');</script>";
?>
</body>
</html>
