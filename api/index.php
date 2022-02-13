<?php
error_reporting(0);
$_DEBUG_MODE = isset($_GET['debug']);
$_CACHE_PATH = "../cache";

$url = isset($_GET['url']) ? $_GET['url'] : 'http://n.berlette.com';

if (substr($url, 0, 4) !== "http") {
	$url = "http://".$url;
}

$parse = parse_url($url);
$domain = $parse['host'];
$favicon_path = '../cache/' . str_replace('.', '-', $domain) . '.png';
$one_day = (60 * 60 * 24);
$one_week = $one_day * 7;
$one_month = $one_day * 30;

header('Content-Type: image/png;charset=utf-8');
if ($_DEBUG_MODE) {
    header('Cache-Control: public, s-maxage=600, max-age=600, stale-while-revalidate=60');
} else {
    header('Cache-Control: public,s-maxage='.$one_week.',stale-while-revalidate=3600,stale-if-error='.$one_day);
}
if (file_exists($favicon_path)) {
    if (isset($_GET['refresh'])) {
        @unlink($favicon_path);
    } else {
        die(file_get_contents($favicon_path));
    }
}
require_once('Favicon.class.php');
$favicon = new FaviconClass($_GET['url']);
if ($_DEBUG_MODE) {
  $favicon->debug();
}
if (!$favicon->icoExists) {
  die(file_get_contents($fallback_path));
}
file_put_contents($favicon_path, $favicon->icoData);
die($favicon->icoData);

?>
