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

$ccFI = "<pre>Tämä sivusto (tools.debexel.eu) ja / tai sen muut verkkotunnukset eivät ole millään tavalla sidoksissa EET Europartsiin, EBayhin ja / tai niiden muihin toimijoihin.
Työkalun tarkoitus on kehittää omaa PHP-osaamistani sekä yksinkertaistaa (mahdollisesti myös nopeuttaen hitaita yhteyksiä käytettäessä) hakujen tekemistä EET Europartsin katalogista.</pre>";

$ccEN = "<pre>This site (tools.debexel.eu) and / or its other domains are not affiliated in any way with EET Europarts, EBay, and / or their other businesses.
This tool was created as part of my PHP-training and also to simplify (and possibly speed up when on slow connections) searching from EET Europarts' and EBay's catalog.</pre>";
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
	<div>
		</br>
	<?php
		if ($geoloc == "FI")
		{
			echo $ccFI;
		}
		else
		{
			echo $ccEN;
		}
	?>
</div>
<?php
echo "Country Code: {$geoplugin->countryCode} <br />";
//echo "<script>window.open('$name');</script>";
?>
</body>
</html>
