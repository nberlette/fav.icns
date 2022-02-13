<?php
  error_reporting(0);
  require_once('Favicon.class.php');

  $_DEBUG_MODE = isset($_GET['debug']) || false;
  $_NO_CACHE = isset($_GET['refresh']) || isset($_GET['no-cache']) ? true : false;

  $url = 'n.berlette.com';
  if (isset($_GET['url'])) {
    $url = $_GET['url'];
  } 
  if (isset($_POST['url'])) {
    $url = $_POST['url'];
    $_NO_CACHE = true;
  }
  if (substr($url, 0, 4) !== 'http') {
    $url = 'http://'.$url;
  }
  $url = filter_var($url, FILTER_SANITIZE_URL);
  $parts = @parse_url($url);
  $url = 'http://'.$parts['host'];

  $favicon = new FaviconClass($url);
  if ($_DEBUG_MODE) $favicon->debug();

  $fallback_path = '../default.png';

  header('Content-Type: image/png;charset=utf-8');
  if ($_NO_CACHE) {
    header('Cache-Control: public, no-cache, must-revalidate');  
  } elseif ($_DEBUG_MODE) {
    header('Cache-Control: public, s-maxage=900, stale-while-revalidate=60');
  } else {
    $day = 60 * 60 * 24;
    header('Cache-Control: public,s-maxage='.($day*14).',stale-while-revalidate='.$day.',stale-if-error='.($day*3));
  }

  $data = $favicon->icoExists ? $favicon->icoData : @file_get_contents($fallback_path);
  header('Content-Length: '. strlen($data));
  die($data);
?>
