<?php
include ("include/conn.php");
$id = $_GET['ukm'];
$qry = mysql_query("delete from tbl_ukm where id_ukm = '$id'");
if($qry){
	mysql_query("delete from tbl_barang where id_ukm = '$id'");
	?>
	<script>
	window.location.href = "<?php echo $link."ukm.html?message=success";?>";
	</script>
	<?php
}else{
	?>
	<script>
	window.location.href = <?php echo $link."ukm.html?message=error";?>";
	</script>
	<?php
}