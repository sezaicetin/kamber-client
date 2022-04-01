<?
session_start();
require $_SESSION['scimgparty'];
scimg::create(250, 250, __DIR__."/../pool/uploads/".$_GET['d']);
?>