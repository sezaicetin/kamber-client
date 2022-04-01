<?
session_start();
require $_SESSION['scimgparty'];
scimg::create(964, 1024, __DIR__."/../pool/uploads/".$_GET['d']);
?>