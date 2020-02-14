<?php
include ("include/conn.php");
include ("include/fungsi_mata_uang.php");

$id = $_GET['produk'];
$qry = mysql_query("SELECT *
							FROM tbl_kategori
							INNER JOIN tbl_barang ON tbl_kategori.id_kategori = tbl_barang.id_kategori
							INNER JOIN tbl_ukm ON tbl_barang.id_ukm = tbl_ukm.id_ukm where tbl_barang.id_barang = '$id'");
$t = mysql_fetch_array($qry);
$idProduk = $t['id_barang'];
$namaProduk = $t['nama_barang'];
$idUkm = $t['id_ukm'];
$namaUKM = $t['nama_ukm'];
$idKategori = $t['id_kategori'];
$namaKategori = $t['nama_kategori'];
$hargaNormal = $t['harga_normal'];
$diskon = $t['harga_diskon'];
$gambar = $t['gambar_barang'];
$ket = $t['ket_barang'];


?>

<div class="center_title_bar">Detil Produk</div>
  <div class="prod_box_big">
    <div class="top_prod_box_big"></div>
    <div class="center_prod_box_big">
      <div class="product_img_big"> <a href="javascript:popImage('produk/<?php echo $gambar;?>','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]"><img src="produk/<?php echo $gambar;?>" alt="" border="0" width="94" height="92" /></a>
        
      </div>
      <div class="details_big_box">
        <div class="product_title_big"><?php echo $namaProduk?></div>
        <div class="specifications"> 
          Status: <span class="blue">Tersedia</span><br />
          Nama UKM: <span class="blue"><a href="produk-ukm.html?ukm=<?php echo $idUkm;?>"><?php echo $namaUKM;?></a></span><br />
          Kategori: <span class="blue"><a href="produk-kategori.html?kategori=<?php echo $idKategori;?>"><?php echo $namaKategori;?></a></span><br />
          Satuan: <span class="blue">Bungkus</span><br />
          
        </div>
        <div class="prod_price_big">
        <?php
		if ($diskon == "0" || $diskon == "-"){
		?>
            <span class="price"><?php echo formatRupiah($hargaNormal);?></span>
        <?php
		}else{
		?>
            <span class="reduce"><?php echo formatRupiah($hargaNormal);?></span>
            <span class="price"><?php echo formatRupiah($diskon);?></span>
        <?php
		}
		?>
        </div>
        <a href="#" class="addtocart">Tambah Ke Keranjang</a> </div>
    </div>
    <div class="bottom_prod_box_big"></div>
</div>

<div class="center_title_bar">Produk Lainnya</div>
	<?php
	
	$qry2 = mysql_query("SELECT *
							FROM tbl_kategori
							INNER JOIN tbl_barang ON tbl_kategori.id_kategori = tbl_barang.id_kategori
							INNER JOIN tbl_ukm ON tbl_barang.id_ukm = tbl_ukm.id_ukm where tbl_barang.id_kategori = '$idKategori' 
							|| tbl_barang.id_ukm = '$idUkm' && tbl_barang.id_barang != '$idProduk' limit 0, 6");
	while ($r = mysql_fetch_array($qry2)){
	?>
	<div class="prod_box">
	<div class="top_prod_box"></div>
		<div class="center_prod_box">
		  <div class="product_title"><a href="detail.html?produk=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang']; ?></a></div>
		  <div class="product_img"><a href="detail.html?produk=<?php echo $r['id_barang'];?>"><img src="produk/<?php echo $r['gambar_barang'];?>" alt="" border="0" width="94" height="92" /></a></div>
		  <div class="prod_price"> 
         	<?php
			if ($r['harga_diskon'] == "0" || $r['harga_diskon'] == "-"){
			?>
				<span class="price"><?php echo formatRupiah($r['harga_normal']);?></span>
			<?php
			}else{
			?>
				<span class="reduce"><?php echo formatRupiah($r['harga_normal']);?></span>
				<span class="price"><?php echo formatRupiah($r['harga_diskon']);?></span>
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
			<a href="detail.html?produk=<?php echo $r['id_barang'];?>" title="header=[Rincian Produk] body=[&nbsp;] fade=[on]" class="prod_detail">details</a>
		</div>
	</div>
	<?php
	}
	?>  
</div>