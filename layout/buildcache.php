<?php

/*** Build cache dummy template ***/
/** call this action via cron to generate cache files, speeding up client requests **/

EbossAPIClient_Cache::$ttl = 1;

$cached_brands = 0;
$cached_products = 0;
$cached_categories = 0;
$cached_ranges = 0;

$slowdown = 50;

$brands = $client->cachedRequest("Brands")->Data();

foreach($brands as $brand_id) {
	$cached_brands++;
	$products = $client->Products($brand_id);
	foreach($products as $product) {
		$cached_products++;
	}
	usleep($slowdown);
	$categories = $client->Categories($brand_id);
	foreach($categories as $category) {
		$cached_categories++;
	}
	usleep($slowdown);
	$ranges = $client->Ranges($brand_id);
	foreach($ranges as $range) {
		$cached_ranges++;
	}
	usleep($slowdown);
	if($cached_brands == 5) {
		//break;
	}
}

echo "Successfully cached {$cached_brands} Brands, ".
	"{$cached_products} Products, {$cached_ranges} Ranges, {$cached_categories} Categories";