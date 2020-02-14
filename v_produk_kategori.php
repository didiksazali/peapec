
<div class="center_title_bar">Daftar Produk</div>
<?php
include ("include/conn.php");
include ("include/fungsi_mata_uang.php");

$idKategori = $_GET['kategori'];

$dataPerhalaman = 12;
if(isset($_GET['halaman'])){
	$nohalaman = $_GET['halaman'];
}else{ 
	$nohalaman = 1;
}

$offset = ($nohalaman - 1) * $dataPerhalaman;

$qry = mysql_query("SELECT *
							FROM tbl_kategori
							INNER JOIN tbl_barang ON tbl_kategori.id_kategori = tbl_barang.id_kategori
							INNER JOIN tbl_ukm ON tbl_barang.id_ukm = tbl_ukm.id_ukm where tbl_barang.id_kategori = '$idKategori' LIMIT $offset, $dataPerhalaman ");
while ($t = mysql_fetch_array($qry)){
?>
<div class="prod_box">
<div class="top_prod_box"></div>
	<div class="center_prod_box">
      <div class="product_title"><a href="detail.html?produk=<?php echo $t['id_barang'];?>"><?php echo $t['nama_barang']; ?></a></div>
      <div class="product_img"><a href="detail.html?produk=<?php echo $t['id_barang'];?>"><img src="produk/<?php echo $t['gambar_barang'];?>" alt="" border="0" width="94" height="92" /></a></div>
      <div class="prod_price">
      	<?php
		if ($t['harga_diskon'] == "0" || $t['harga_diskon'] == "-"){
		?>
            <span class="price"><?php echo formatRupiah($t['harga_normal']);?></span>
        <?php
		}else{
		?>
            <span class="reduce"><?php echo formatRupiah($t['harga_normal']);?></span>
            <span class="price"><?php echo formatRupiah($t['harga_diskon']);?></span>
        <?php
		}
		?>
      </div>
	</div>
	<div class="bottom_prod_box"></div>
	<div class="prod_details_tab"> 
    	<a href="#" title="header=[Tambah Kekeranjang] body=[&nbsp;] fade=[on]" class="prod_buy">
            Beli Item
        </a> 
        <a href="detail.html?produk=<?php echo $t['id_barang'];?>" title="header=[Rincian Produk] body=[&nbsp;] fade=[on]" class="prod_detail">details</a>
    </div>
</div>
<?php
}
?>

<div class="pages">
	
	

<?php

// mencari jumlah semua data dalam tabel guestbook		
$qry2 = mysql_query("SELECT COUNT(*) as jumlah
							FROM tbl_kategori
							INNER JOIN tbl_barang ON tbl_kategori.id_kategori = tbl_barang.id_kategori
							INNER JOIN tbl_ukm ON tbl_barang.id_ukm = tbl_ukm.id_ukm where tbl_barang.id_kategori = '$idKategori'");
$g = mysql_fetch_array($qry2);
$jumData = $g['jumlah'];
// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
$jumhalaman = ceil($jumData/$dataPerhalaman);

// menampilkan link previous
if ($nohalaman > 1){
	echo  "<a href='produk-kategori.html?kategori=".$idKategori."&halaman=".($nohalaman-1)."' class='nextprev'>&lt;&lt; Prev</a>";
}


// memunculkan nomor halaman dan linknya
for($halaman = 1; $halaman <= $jumhalaman; $halaman++)
{
		 if ((($halaman >= $nohalaman - 3) && ($halaman <= $nohalaman + 3)) || ($halaman == 1) || ($halaman == $jumhalaman)) 
		 {   
			if (($showhalaman == 1) && ($halaman != 2)){  echo "<span>...</span>";} 
			if (($showhalaman != ($jumhalaman - 1)) && ($halaman == $jumhalaman)){  echo "<span>...</span>";}
			if ($halaman == $nohalaman){ 
				echo "<span class='current'>$halaman</span>";
			}else{ 
				echo " <a href='produk-kategori.html?kategori=".$idKategori."&halaman=".$halaman." '>".$halaman."</a> ";
			}
			$showhalaman = $halaman;          
		 }
}

// menampilkan link next
if ($nohalaman < $jumhalaman){ 
	echo "<a href='produk-kategori.html?kategori=".$idKategori."&halaman=".($nohalaman+1)."' class='nextprev'>Next &gt;&gt;</a>";
}
?>

</div>
<br>
<br>