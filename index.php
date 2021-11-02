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
/*
//GeoLocation data will not be used until further notice. I don't want to deal with GDPR in any way just yet.
//Include geolocation class
//require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();
//IP Geolocation check
$geoplugin->locate();
$geoloc = "{$geoplugin->countryCode}";
//
*/

/*
Translations for the disclaimer. You are free to add translations for other languages you feel the need for.
Just keep them inside <pre></pre> tags and try to keep the format as nice as possible.
*/
$ccFI = "<pre>Tämä sivusto (tools.debexel.eu) ja / tai sen muut verkkotunnukset eivät ole millään tavalla sidoksissa EET Europartsiin, eBayhin ja / tai niiden muihin toimijoihin.
Tällä työkalulla on kaksi tarkoitusta:
- Antaa minulle mahdollisuus kehittää omaa PHP-osaamistani
- Yksinkertaistaa, ehkäpä jopa nopeuttaa (*Intensiivinen tuijotus hitaita mobiiliyhteyksiä kohti*) hakua EET Europartsin sekä eBayn katalogeista.</pre>";

$ccEN = "<h3 style='font-family:monospace'>The daily dose of legal stuff, I guess?</h3>
<pre>This site (tools.debexel.eu/tools.sarre.eu) and/or its other domains are not affiliated in any way with EET Europarts, eBay, and/or their other businesses.
This tool has two main purposes:
- Give me a chance to develop my PHP-skills
- Simplify, perhaps even speed-up (*Intense staring at slow mobile connections*) searching from EET Europarts' and eBay's catalogs.

</pre>
<h3 style='font-family:monospace'>GOOD TO KNOW:</h3>
<pre>Any plus (+) signs in input will be converted to hyphens (-).
This is done in the hopes that a barcode which has hyphen(s) would be correct even with different barcode scanner settings.

Sorry for any inconvenience!</pre>";
?>
<h3>Search from EET Europarts' catalog</h3>
	<form method="post" action="/">
		Search for: <input type="text" name="eet" value="" autofocus required>
		<input type="hidden" name="service" value="eet">
		<br><br>
		<input type="submit" name="submit" value="Submit" tabindex="-1">
	</form>
</div>

<hr />
<div id="content2" class="content hidden">
<h3>Search from eBay's catalog</h3>
	<form method="post" action="/">
		Search for: <input type="text" name="ebay" value="" required>
		<input type="hidden" name="service" value="ebay">
		<br><br>
		<input type="submit" name="submit" value="Submit" tabindex="-1">
	</form>
</div>
<div id="content3" class="content hidden"></div>
	<hr />
	<div>
		</br>
	<?php
	/*
	//GeoLocation data will not be used until further notice. I don't want to deal with GDPR in any way just yet.
	//If your country code is "FI", print the disclaimer in finnish. For anything else, print it in english.
		if ($geoloc == "FI")
		{
			echo $ccFI;
		}
		else
		{
			echo $ccEN;
		}
	//
	*/

	//Just print the disclaimer in english.
	echo $ccEN;
	?>
</div>
<?php

if(isset($_POST['submit'])) {
	unset($_POST['submit']);
	if ($_POST['service'] == "eet") {
		//Hardcoded hyphens in place of plus signs. Also some sanity checking.
		$_POST['eet'] = str_replace('+', '-', htmlspecialchars($_POST['eet']));

		?>
		<script type="text/javascript">
			window.open('https://www.eetgroup.com/fi-fi/?term=<?php echo $_POST["eet"]; ?>', '_newtab');
		</script>

		<?
	}
		else
	{
		//Hardcoded hyphens and sanity checking..
		$_POST['ebay'] = str_replace('+', '-', htmlspecialchars($_POST['ebay']));

		?>
		<script type="text/javascript">
			window.open('https://www.ebay.com/sch/i.html?_nkw=<?php echo $_POST["ebay"]; ?>', '_newtab');
		</script>

		<?
	};
}

/*
//GeoLocation data will not be used until further notice. I don't want to deal with GDPR in any way just yet.
//Kinda obvious, but this prints your current country code on the page for you to see.
echo "Country Code: {$geoplugin->countryCode} <br />";
//
*/
?>
<hr />
<!-- <a href="https://www.geoplugin.com/geolocation/" target="_new">IP Geolocation</a> by <a href="https://www.geoplugin.com/" target="_new">geoPlugin</a> -->
</body>
</html>