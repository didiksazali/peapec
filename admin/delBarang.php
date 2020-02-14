<?php
include ("include/conn.php");
$id = $_GET['barang'];
$ambilBarang = mysql_query("select * from tbl_barang where id_barang = '$id'");
$j = mysql_fetch_array($ambilBarang);
$gambar = $j['gambar_barang'];
$qry = mysql_query("delete from tbl_barang where id_barang = '$id'");
if($qry){
	unlink("../produk/$gambar");
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