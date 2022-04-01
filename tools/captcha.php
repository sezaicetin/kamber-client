<?
ob_start(); session_start();
require $_SESSION['captchaparty'];
captcha::create();
?>