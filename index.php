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
Translations for the disclaimer. Feel free to add translations for other languages you feel the need for.
Just keep them inside <pre></pre> tags and try to keep the format as nice as possible.
Might actually have to make a dedicated file for translations later. We'll see.
*/

$ccEN = "<h3 style='font-family:monospace'>The daily dose of legal stuff, I guess?</h3>
<pre>This site (tools.debexel.eu/tools.sarre.eu) and/or its other domains are not affiliated in any way with EET Europarts, eBay, and/or their other businesses.
This tool has two main purposes:
- Give me a chance to develop my PHP skills
- Simplify, perhaps even speed-up searching from EET Europarts' and eBay's catalogs. (*Staring at slow mobile connections*) 

</pre>
<h3 style='font-family:monospace'>GOOD TO KNOW:</h3>
<pre>Any plus (+) signs in input will be converted to hyphens (-).
This is done in the hopes that a barcode which has hyphen(s) would be correct even with different barcode scanner settings.

Sorry for any inconvenience!</pre>";
?>

<noscript type="text/javascript">
<pre>Please enable/allow JavaScript on this page, it is required for opening the search results.
In case you're unsure if you should enable it, the source code for this page is available at https://github.com/DebexeL/tools.debexel.eu (Contributions are welcome!)
Check it out and make an informed decision. Have a good day! :)</pre>
</noscript>

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
	//Just print the disclaimer in english.
	echo $ccEN;
	?>
</div>
<?php

if(isset($_POST['submit'])) {
	unset($_POST['submit']);
	if ($_POST['service'] == "eet") {
		//Hardcoded hyphens in place of plus signs, however bad design that may be. Also some sanity checking.
		$_POST['eet'] = str_replace('+', '-', htmlspecialchars($_POST['eet']));

		?>
		<script type="text/javascript">
			window.open('https://www.eetgroup.com/fi-fi/?term=<?php echo $_POST["eet"]; ?>', '_newtab');
			window.location.href = window.location.href;
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
			window.location.href = window.location.href;
		</script>

		<?
	};
}

?>
<hr />
</body>
</html>