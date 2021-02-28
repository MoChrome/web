<?php
session_start();
$captcha = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 6);
$_SESSION['captcha'] = $captcha;

$gambar = imageCreate(100, 40);
$wk = imageColorAllocate($gambar, 0, 0, 0);
$wt = imageColorAllocate($gambar, 255, 255, 255);

imagestring($gambar, 25, 10, 10, $captcha, $wt);
imagejpeg($gambar);
