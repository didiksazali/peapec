<?php
include ("include/conn.php");

session_name("akses");
session_start();
$username=$_POST['txtUsername'];
$passs=md5($_POST['txtPassword']);


$qry = mysql_query("select * from tbl_admin where user_admin = '$username' and pass_admin = '$passs'");
$row = mysql_fetch_array($qry);
if ($row){
	$_SESSION['hak_akses']="Administrator";
	$_SESSION['nama'] = $row['nama_admin'];
	$_SESSION['username'] = $row['user_admin'];
	$_SESSION['password'] = $row['pass_admin'];
	?>
    <script>
		window.location.href="index.html";
	</script>
    <?php
}else{
	unset($_SESSION["akses"]);
	session_unset();
	session_destroy();
	?>
    <script>
		window.location.href="masuk.html";
	</script>
    <?php
}
?>