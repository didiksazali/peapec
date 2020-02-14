<?php
include ("cekSession.php");
include ("include/conn.php");
$aksi = $_POST['jenis'];
$isiKet = $_POST['txtKet'];
$ket = str_replace("'","&apos;",$isiKet);
if ($aksi == 'Edit'){
	if ($ket==""){
		?>
		<script>
			window.location.href="<?php echo $link;?>edit-kontak.html?message=error";
		</script>
		<?php
	}else{
		$qrySimpan = mysql_query("update tbl_informasi set ket='$ket' where jenis = 'Kontak'");
		if ($qrySimpan){
			?>
			<script>
				window.location.href="<?php echo $link;?>kontak.html?message=success";
			</script>
			<?php
		}
	}
}else if($aksi == "Simpan"){
	if ($ket==""){
		?>
		<script>
			window.location.href="<?php echo $link;?>tambah-kontak.html?message=error";
		</script>
		<?php
	}else{
		$qrySimpan = mysql_query("insert into tbl_informasi values ('', 'Kontak','$ket','-')");
		if ($qrySimpan){
			?>
			<script>
				window.location.href="<?php echo $link;?>kontak.html?message=success";
			</script>
			<?php
		}else{
			echo "Gagal";
		}
	}
}
?>