<?php
$page = htmlentities($_GET['page']);
$halaman = $page;
if($page=="" || empty($page)){
	include ("main.php");
}else{
	include ($halaman);
}
?>