<?php
include ("cekSession.php");
include ("include/conn.php");
include ("include/fungsi.php");
$id = $_GET['id'];

$qrySelect = mysql_query("select * from tbl_slider where id_slider = '$id'");
$y = mysql_fetch_array($qrySelect);

$foto = $y['foto_slider'];


$qry = mysql_query("delete from tbl_slider where id_slider = '$id'");
if($qry){
	unlink("../images/slider/$foto");
	?>
	<script>
	window.location.href = "<?php echo $link."slider.html?message=success";?>";
	</script>
	<?php
}else{
	?>
	<script>
	window.location.href = <?php echo $link."slider.html?message=error";?>";
	</script>
	<?php
}
?>