<?php
//Check whether we are searching from EET or eBay.
if ($_POST['service'] == "eet") {
	//Add country code prefix to url.
	$geoloc2 = $_POST['geoloc'];
	//GO.
	header("Location: https://{$geoloc2}.eetgroup.com/search?query=" . $_POST['eet']);
}
	else
{
	header("Location: https://www.ebay.com/sch/i.html?_from=R40&_trksid=m570.l1313&_nkw=" . $_POST['ebay']);
};
?>