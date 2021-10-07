<?php
//Check whether we are searching from EET or eBay.
if ($_POST['service'] == "eet") {
	//Hardcoded hyphens in place of plus signs.
	$_POST['eet'] = str_replace('+', '-', $_POST['eet']);
	header("Location: https://www.eetgroup.com/fi-fi/?term=" . $_POST['eet']);
}
	else
{
	//Hardcoded hyphens in place of plus signs.
	$_POST['ebay'] = str_replace('+', '-', $_POST['ebay']);
	header("Location: https://www.ebay.com/sch/i.html?_nkw=" . $_POST['ebay']);
};

/* OLD
if ($_POST['service'] == "eet") {
	header("Location: https://www.eetgroup.com/fi-fi/?term=" . $_POST['eet']);
	}
		else
	{
	header("Location: https://www.ebay.com/sch/i.html?_nkw=" . $_POST['ebay']);
};
*/
?>