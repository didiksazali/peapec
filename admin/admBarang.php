<?php
include ("cekSession.php");
/*if ($menu5=="N"){
	?>
    <script>
	window.location.href = "index.html";
	</script>
    <?php
}*/
include ("include/conn.php");
include ("include/fungsi_indotgl.php");
include ("include/fungsi_mata_uang.php");
include ("include/ambilHariIndo.php");
include ("include/tanggal.php");
$qryBarang = mysql_query("SELECT *
							FROM tbl_kategori
							INNER JOIN tbl_barang ON tbl_kategori.id_kategori = tbl_barang.id_kategori
							INNER JOIN tbl_ukm ON tbl_barang.id_ukm = tbl_ukm.id_ukm");
$jum = mysql_num_rows($qryBarang);



?>
<script type="text/javascript" src="jquery-1.7.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/modal/jquery-confirm.css" />
<script type="text/javascript" src="assets/modal/jquery-confirm.js"></script>


<link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <div class="row">
        <div class="col-lg-12">
        <h1>Pengaturan Produk</h1>
        <hr />
        <?php
		$pesan = $_GET['message'];
		if ($pesan=="success"){
		?>
			<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Operasi Berhasil Dijalankan
			</div>
		<?php
		}elseif ($pesan=="error"){
		?>
			<div class="alert alert-warning alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Operasi Gagal Dijalankan
			</div>
		<?php
		}
		?>
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>DAFTAR PRODUK</h5>
            <div class="toolbar" style="margin-top:3px; margin-right:5px;"> 
                <a href="<?php echo $link."tambah-barang.html";?>" >
                    <button class="btn btn-info">
                        <i class="icon-plus">&nbsp;&nbsp;Tambah Barang</i>
                    </button>
                </a>
            </div>
            
        </header>
        
        <div id="div-1" class="accordion-body collapse in body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th style="width:20%; vertical-align:middle; text-align:center;">Nama Barang</th>
                            <th style="width:20%; vertical-align:middle; text-align:center;">Kategori</th>
                            <th style="width:15%; vertical-align:middle; text-align:center;">Nama UKM</th>
                            <th style="width:10%; vertical-align:middle; text-align:center;">Harga<br />Normal</th>
                            <th style="width:10%; vertical-align:middle; text-align:center;">Harga<br />Diskon</th>
                            <th style="width:10%; vertical-align:middle; text-align:center;">Gambar</th>
                            <th style="width:10%; vertical-align:middle; text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($p = mysql_fetch_array($qryBarang)){
                    ?>
                        <tr class="odd gradeX">
                            <td><?php echo $p['nama_barang'];?></td>
                            <td><?php echo $p['nama_kategori'];?></td>
                            <td><?php echo $p['nama_ukm'];?></td>
                            <td><?php echo formatRupiah($p['harga_normal']);?></td>
                            <td><?php echo formatRupiah($p['harga_diskon']);?></td>
                            <td class="center" style="text-align:center;"><img src="../produk/<?php echo $p['gambar_barang'];?>" style="width:90px; height:90px;"></td>
                            <td class="center" style="text-align:center; vertical-align:middle;">
                            <a style="text-decoration:none;" href="edit-barang.html?barang=<?php echo $p['id_barang'];?>">
                              <i class="glyphicon glyphicon-pencil"></i>
                            </a> &nbsp;
                            <a style="text-decoration:none; cursor:pointer;" title="Hapus Barang"  onclick="return hapus('<?php echo $p['id_barang'];?>')">
                              <i class="glyphicon glyphicon-trash"></i>
                            </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
        </div>
        	</div>
    	</div>
	</div>      
</div>

<!-- Screenfull -->
<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
	function hapus(id){
		$.confirm({
			title: 'Hapus Data',
			content: 'Anda yakin ingin menghapus Produk ini?',
			confirmButton: 'OK',
			confirmButtonClass: 'btn-info',
			icon: 'fa fa-question-circle',
			animation: 'top',
			confirm: function () {
				window.location.href='hapus-barang.html?barang='+id;
			}
		});
	}
	
	
	$(document).ready(function () {
		$('#dataTables-example').dataTable();
	});
	
	
	
	
</script>