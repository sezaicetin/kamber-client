<?
session_start();
require $_SESSION['scimgparty'];
scimg::create(1024, 1024, __DIR__."/../pool/uploads/".$_GET['d']);
?>