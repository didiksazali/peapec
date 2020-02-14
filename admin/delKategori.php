<?php
include ("include/conn.php");
$id = $_GET['kategori'];
$qry = mysql_query("delete from tbl_kategori where id_kategori = '$id'");
if($qry){
	mysql_query("delete from tbl_barang where id_kategori = '$id'");
	?>
	<script>
	window.location.href = "<?php echo $link."kategori.html?message=success";?>";
	</script>
	<?php
}else{
	?>
	<script>
	window.location.href = <?php echo $link."kategori.html?message=error";?>";
	</script>
	<?php
}