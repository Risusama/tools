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
//Include geolocation class
require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();
//IP Geolocation check
$geoplugin->locate();
$geoloc = "{$geoplugin->countryCode}";

/*
Translations for the disclaimer. You are free to add translations for other languages you feel the need for.
Just keep them inside <pre></pre> tags and try to keep the format as nice as possible.
*/
$ccFI = "<pre>Tämä sivusto (tools.debexel.eu) ja / tai sen muut verkkotunnukset eivät ole millään tavalla sidoksissa EET Europartsiin, eBayhin ja / tai niiden muihin toimijoihin.
Työkalun tarkoitus on kehittää omaa PHP-osaamistani sekä yksinkertaistaa (mahdollisesti myös nopeuttaen hitaita yhteyksiä käytettäessä) hakujen tekemistä EET Europartsin sekä eBayn katalogista.</pre>";

$ccEN = "<pre>This site (tools.debexel.eu) and / or its other domains are not affiliated in any way with EET Europarts, eBay, and / or their other businesses.
This tool was created as a part of my PHP-training and also to simplify (and possibly speed up when on slow connections) searching from EET Europarts' and eBay's catalog.</pre>";
?>

<h2>Search from EET Europarts' catalog</h2>
	<form method="post" action="search.php">  
		Search for: <input type="text" name="eet" value="" autofocus>
		<input type="hidden" name="geoloc" value="<?php echo $geoloc;?>">
		<input type="hidden" name="service" value="eet">
		<br><br>
		<input type="submit" name="submit" value="Submit">  
	</form>
</div>

<hr />
<div id="content2" class="content hidden">
<h2>Search from eBay's catalog</h2>
	<form method="post" action="search.php">  
		Search for: <input type="text" name="ebay" value="">
		<input type="hidden" name="service" value="ebay">
		<br><br>
		<input type="submit" name="submit" value="Submit">  
	</form>
</div>
<div id="content3" class="content hidden"></div>
	<hr />
	<div>
		</br>
	<?php
	//If your country code is "FI", print the disclaimer in finnish. For anything else, print it in english.
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
//Kinda obvious, but this prints your current country code on the page for you to see.
echo "Country Code: {$geoplugin->countryCode} <br />";
?>
<hr />
<a href="https://www.geoplugin.com/geolocation/" target="_new">IP Geolocation</a> by <a href="https://www.geoplugin.com/" target="_new">geoPlugin</a>
</body>
</html>
