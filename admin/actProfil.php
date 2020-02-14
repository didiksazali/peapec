<?php
include ("cekSession.php");
include ("include/conn.php");
$aksi = $_POST['jenis'];
$ket = $_POST['txtKet'];
if ($aksi == 'Edit'){
	if ($ket==""){
		?>
		<script>
			window.location.href="<?php echo $link;?>edit-profil.html?message=error";
		</script>
		<?php
	}else{
		$qrySimpan = mysql_query("update tbl_informasi set ket='$ket' where jenis = 'Profil'");
		if ($qrySimpan){
			?>
			<script>
				window.location.href="<?php echo $link;?>profil.html?message=success";
			</script>
			<?php
		}
	}
}else if($aksi == "Simpan"){
	if ($ket==""){
		?>
		<script>
			window.location.href="<?php echo $link;?>tambah-profil.html?message=error";
		</script>
		<?php
	}else{
		$qrySimpan = mysql_query("insert into tbl_informasi values ('', 'Profil','$ket','-')");
		if ($qrySimpan){
			?>
			<script>
				window.location.href="<?php echo $link;?>profil.html?message=success";
			</script>
			<?php
		}else{
			echo "Gagal";
		}
	}
}
?>