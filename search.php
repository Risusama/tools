<?php
//Check whether we are searching from EET or eBay.
if ($_POST['service'] == "eet") {
	header("Location: https://shop.eetgroup.com/search?query=" . $_POST['eet']);
	}
		else
	{
	header("Location: https://www.ebay.com/sch/i.html?_from=R40&_trksid=m570.l1313&_nkw=" . $_POST['ebay']);
};
?>