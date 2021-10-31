<?php
$url = $_SERVER['REQUEST_URI'];
$before = $_SERVER['HTTP_REFERER'];
$ad_code = "";

if (isset($_GET)) {
  $flg = 0;
  foreach ($_GET as $key => $value) {
    if ($key == 'code') {
      $flg = 1;
    }
    if ($flg === 1) {

      if ($key == 'code') {
        $ad_code .= urlencode($value);
      } else {
        $ad_code .= '&' . $key . '=' . urlencode($value);
      }
    }
  }
}
