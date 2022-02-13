<?php
  /**
   * @fileoverview 
   */
  error_reporting(0);
  require_once('Favicon.class.php');

  $_DEBUG_MODE = isset($_GET['debug']);
  $url = isset($_GET['url']) ? $_GET['url'] : 'http://n.berlette.com';

  if (substr($url, 0, 4) !== "http") $url = "http://".$url;

  $fallback_path = '../default.png';
  $favicon = new FaviconClass($url);

  if ($_DEBUG_MODE) $favicon->debug();

  $parse = parse_url($url);
  $domain = $parse['host'];

  header('Content-Type: image/png;charset=utf-8');

  if ($_DEBUG_MODE) {
      header('Cache-Control: public, s-maxage=600, max-age=600, stale-while-revalidate=60');
  } else {
    $one_day = (60 * 60 * 24);
    header('Cache-Control: public, s-maxage=' . ($one_day * 14) . ',stale-while-revalidate=' . $one_day . ', stale-if-error=' . ($one_day * 3));
  }

  if ($favicon->icoExists) {
    $data = $favicon->icoData;
  } else {
    $data = file_get_contents($fallback_path);
  }
  
  header('Content-Length: '. strlen($data));
  die($data);
?>
