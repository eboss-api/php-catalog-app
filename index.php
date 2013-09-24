<?php

if(file_exists(dirname(__FILE__)."config.php")) {
	require("config.php");
}

require_once("EbossAPIClient.php");

global $catalog_base_url;
$catalog_base_url = (isset($catalog_base_url)) ? $catalog_base_url : "index.php";


if(!isset($api_user) || !isset($api_key) || !isset($api_base)) {
	die("API Credentials not set. Please check your config.");
}


//TODO: make me nicer
function display_link($action, $params = array()) {
	global $catalog_base_url;
	$query = http_build_query($params);
	return "{$catalog_base_url}?action={$action}&amp;{$query}";
}


function build_menu($items, $action, $query_params_callback, $current_id = 0) {
	$ret = "";
	if($items) {
		$ret .= "<ul class=\"{$action}_menu\">\n";
		foreach($items as $item) {
			$ret .= menu_item($item, $action, $query_params_callback, $current_id);
		}
		$ret .= "</ul>\n\n";
	}
	return $ret;
}

function menu_item($item, $action, $query_params_callback, $current_id = 0) {
	$ret = "";
	if(isset($item->Children)) {
		foreach($item->Children as $child) {
			$ret .= menu_item($child, $action, $query_params_callback, $current_id);
		}
	} else {
		$params = $query_params_callback($item);
		$link = display_link($action, $params);
		$class = ($item->ID == $current_id) ? "current" : "link";
		$ret .= "\t<li class=\"{$class}\"><a href=\"{$link}\">{$item->Title}</a></li>\n";
	}
	return $ret;
}

function get_unique_file_extensions($files) {
	$ret = array();
	foreach($files as $file) {
		foreach((array)$file as $field => $value) {
			if(is_array($value)) {
				$ret = array_merge($ret, get_unique_file_extensions($value));
			} else {
				if($field == "Extension") {
					$ret[] = $value;
				} 
			}
		}
	}
	return array_unique($ret);
}

if(empty($client)) {
	$client = new EbossAPIClient($api_user, $api_key, $api_base);
}

$actions = array(
	"index",
	"category",
	"categories",
	"ranges",
	"range",
	"products",
	"product",
	"downloads"
);

$action = (isset($_GET['action']) && in_array($_GET['action'], $actions)) ? $_GET['action'] : "index";

$current_brand_id = $brand_id;

$current_category_id = 	isset($_GET['category_id']) ? 	(int)$_GET['category_id'] 	: false;
$current_range_id = 	isset($_GET['range_id']) 	? 	(int)$_GET['range_id'] 		: false;
$current_product_id = 	isset($_GET['product_id']) 	? 	(int)$_GET['product_id'] 	: false;

$current_downloader_url = $catalog_base_url."?action=downloads";
$current_downloader_url.= ($current_product_id) ? "&amp;product_id=".$current_product_id : "";

try {
	$current_brand = ($current_brand_id) ? 
		$client->Brand($current_brand_id) : false;

	if(($current_brand_id && $current_product_id)) {
		$current_product = $client->Product($current_brand_id, $current_product_id);
		if($current_product->CategoryID) {
			$current_category_id = $current_product->CategoryID;
		}
		if($current_product->RangeID) {
			$current_range_id = $current_product->RangeID;
		}
	} else {
		$current_product = false;
	}

	$current_category = ($current_brand_id && $current_category_id) ? 
		$client->Category($current_brand_id, $current_category_id) : false;

	$current_range = ($current_brand_id && $current_range_id) ? 
		$client->Range($current_brand_id, $current_range_id) : false;


	$current_page_title = $current_brand->Title;

	if($current_category) 	$current_page_title = $current_page_title." &raquo; ".$current_category->Title;
	if($current_range) 		$current_page_title = $current_page_title." &raquo; ".$current_range->Title;
	if($current_product) 	$current_page_title = $current_page_title." &raquo; ".$current_product->Title;
} catch(EbossAPIClient_Exception $e) {
	$current_page_title = "Error";
	$error_message = $e->getMessage();
	$error_code = $e->getCode();

	if($error_code == "404") {
		header("HTTP/1.1 404 Not Found");
	} else {
		header('HTTP/1.1 500 Internal Server Error');
	}
	
	$action = "error";
}

$include_header = true;
$include_footer = true;

include("layout/{$action}.php");
