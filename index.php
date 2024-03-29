<!--

	Tools (tools.sarre.eu) / A simple tool with a simple look to make searches from some web shops.
    Copyright (C) 2021  Christian Sarre

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published
    by the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.

-->


<!DOCTYPE HTML>  
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width">
		<title>Catalog Search Tools</title>
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="apple-mobile-web-app-title" content="Search Tools">
		<meta name="application-name" content="Search Tools">
		<meta name="msapplication-TileColor" content="#2d89ef">
		<meta name="theme-color" content="#1a9def">
	</head>
<body>

<div id="content1" class="content"><?php

/*
Translations for the disclaimer. Feel free to add translations for other languages you feel the need for.
Just keep them inside <pre></pre> tags and try to keep the format as nice as possible.
Might actually have to make a dedicated file for translations later. We'll see.
*/

$ccEN = "<h3 style='font-family:monospace'>The daily dose of legal stuff, I guess?</h3>
<pre>This site (tools.debexel.eu/tools.sarre.eu) or its other domains 
are not affiliated with / to the mentioned services.

Source code is located at
https://github.com/DebexeL/tools

</pre>
<h3 style='font-family:monospace'>GOOD TO KNOW:</h3>
<pre>Some barcode scanners do not support international keyboard layout.
Because of that, plus signs in input will be converted to hyphens.


Sorry for any inconvenience!</pre>";
?>

<noscript type="text/javascript">
<pre>Please enable/allow JavaScript on this page, it is required for opening the search results.
Unsure if you should enable it?
There's a link in the bottom that leads to the repository for this page. 
	(Contributions are welcome!)

Check it out and make an informed decision. Have a good day! :)</pre>
</noscript>

<h3>Search from EET Europarts</h3>
	<form method="post" action="/">
		<label>
		Search for: <input type="text" name="eet" value="" autofocus required>
		</label>
		<input type="hidden" name="service" value="eet">
		<br><br>
		<input type="submit" name="submit" value="Submit" tabindex="-1">
	</form>
</div>

<!-- <hr /> -->
<div id="content2" class="content hidden">
<h3>Search from eBay</h3>
	<form method="post" action="/">
		<label>
			Search for: <input type="text" name="ebay" value="" required>
		</label>
		<input type="hidden" name="service" value="ebay">
		<br><br>
		<input type="submit" name="submit" value="Submit" tabindex="-1">
	</form>
</div>

<div id="content3" class="content hidden">
<h3>Search from Amazon</h3>
	<form method="post" action="/">
		<label>
			Search for: <input type="text" name="amazon" value="" required>
		</label>
		<input type="hidden" name="service" value="amazon">
		<br><br>
		<input type="submit" name="submit" value="Submit" tabindex="-1">
	</form>
</div>

<div id="content4" class="content hidden">
<h3>Search from Alibaba</h3>
	<form method="post" action="/">
		<label>
			Search for: <input type="text" name="alibaba" value="" required>
		</label>
		<input type="hidden" name="service" value="alibaba">
		<br><br>
		<input type="submit" name="submit" value="Submit" tabindex="-1">
	</form>
</div>

<div id="content5" class="content hidden"></div>
	<hr />
	<div id="ccEN" style="font-size:11px">
		</br>
	<?php
	//Just print the disclaimer in english.
	echo $ccEN;
	?>
</div>
<?php

if(isset($_POST['submit'])) {
	unset($_POST['submit']);
	if ($_POST['service'] == "eet")
	{
		//Hardcoded hyphens in place of plus signs, however bad design that may be. Also some sanity checking.
		$_POST['eet'] = str_replace('+', '-', htmlspecialchars($_POST['eet']));

		?>
		<script type="text/javascript">
			window.open('https://www.eetgroup.com/fi-fi/?term=<?php echo $_POST["eet"]; ?>', '_eet').focus();
			window.location.href = window.location.href;
		</script>

		<?
	}
		elseif ($_POST['service'] == "ebay") 
	{
		//Hardcoded hyphens and sanity checking..
		$_POST['ebay'] = str_replace('+', '-', htmlspecialchars($_POST['ebay']));

		?>
		<script type="text/javascript">
			window.open('https://www.ebay.com/sch/i.html?_nkw=<?php echo $_POST["ebay"]; ?>', '_ebay').focus();
			window.location.href = window.location.href;
		</script>

		<?
	}
		elseif ($_POST['service'] == "amazon")
	{
		//Hardcoded hyphens and sanity checking..
		$_POST['amazon'] = str_replace('+', '-', htmlspecialchars($_POST['amazon']));

		?>
		<script type="text/javascript">
			window.open('https://www.amazon.com/s?k=<?php echo $_POST["amazon"]; ?>', '_amazon').focus();
			window.location.href = window.location.href;
		</script>

		<?
	}
		elseif ($_POST['service'] == "alibaba")
	{
		//Hardcoded hyphens and sanity checking..
		$_POST['alibaba'] = str_replace('+', '-', htmlspecialchars($_POST['alibaba']));

		?>
		<script type="text/javascript">
			window.open('https://www.alibaba.com/trade/search?SearchText=<?php echo $_POST["alibaba"]; ?>', '_alibaba').focus();
			window.location.href = window.location.href;
		</script>

		<?
	};
}

?>
<hr />
</body>
</html>
