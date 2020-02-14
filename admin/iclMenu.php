<?php
include ("cekSession.php");
include ("include/conn.php");

$page = $_GET['page'];
?>

<li <?php if ($page==""){ 
	echo "class='panel active'";
	}
	else{
		echo "class='panel'";
	} ?>
 >
    <a href="<?php echo $link."index.html"; ?>" >
        <i class="icon-home"></i> Dashboard
    </a>                   
</li>



<?php if ($page=="admProfil.php" || $page=="addProfil.php" || $page=="editProfil.php" || $page=="actProfil.php"){ 
echo "<li class='panel active'>";
}else{ 
echo "<li class='panel'>";
 }?>

    <a href="profil.html">
        <i class="icon-tasks"> </i> Profil
</a>
</li>

<?php if ($page=="admCaraPembelian.php" || $page=="addCaraPembelian.php" || $page=="editCaraPembelian.php" || $page=="actCaraPembelian.php"){ 
echo "<li class='panel active'>";
}else{ 
echo "<li class='panel'>";
 }?>

    <a href="cara-pembelian.html">
        <i class="icon-tasks"> </i> Cara Pembelian
</a>
</li>

<?php if ($page=="admKontak.php" || $page=="addKontak.php" || $page=="editKontak.php" || $page=="actKontak.php"){ 
echo "<li class='panel active'>";
}else{ 
echo "<li class='panel'>";
 }?>

    <a href="kontak.html">
        <i class="icon-tasks"> </i> Kontak
</a>
</li>

<?php if ($page=="admKategori.php" || $page=="addKategori.php" || $page=="editKategori.php" || $page=="delKategori.php"){ 
echo "<li class='panel active'>";
}else{ 
echo "<li class='panel'>";
 }?>

    <a href="kategori.html">
        <i class="icon-tasks"> </i> Kategori Barang
</a>
</li>

<?php if ($page=="admUKM.php" || $page=="addUKM.php" || $page=="editUKM.php" || $page=="delUKM.php"){ 
echo "<li class='panel active'>";
}else{ 
echo "<li class='panel'>";
 }?>

    <a href="ukm.html">
        <i class="icon-tasks"> </i> Usaha Kecil Menengah
</a>
</li>

<?php if ($page=="admBarang.php" || $page=="addBarang.php" || $page=="editBarang.php" || $page=="delBarang.php"){ 
echo "<li class='panel active'>";
}else{ 
echo "<li class='panel'>";
 }?>

    <a href="barang.html">
        <i class="icon-tasks"> </i> Daftar Barang
</a>
</li>