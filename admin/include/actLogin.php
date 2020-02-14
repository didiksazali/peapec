<?php
$conn = mysql_connect("localhost","root","");
$db = mysql_select_db("db_satpol_pp", $conn);

session_name("akses");
session_start();
$username=$_POST['txtUsername'];
$passs=md5($_POST['txtPassword']);


$qry = mysql_query("select * from tbl_login where user = '$username' and pas_enc = '$passs'");
$row = mysql_fetch_array($qry);
if ($row){
	$_SESSION['hak_akses']="Administrator";
	$_SESSION['username'] = $row['user'];
	$_SESSION['password'] = $row['pass'];
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