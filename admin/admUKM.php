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
include ("include/ambilHariIndo.php");
include ("include/tanggal.php");
$qryKategori = mysql_query("select * from tbl_ukm order by ket_ukm desc");
$jum = mysql_num_rows($qryKategori);



?>
<script type="text/javascript" src="jquery-1.7.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/modal/jquery-confirm.css" />
<script type="text/javascript" src="assets/modal/jquery-confirm.js"></script>


<link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <div class="row">
        <div class="col-lg-12">
        <h1>Pengaturan Usaha Kecil Menengah (UKM)</h1>
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
            <h5>DAFTAR UKM</h5>
            <div class="toolbar" style="margin-top:3px; margin-right:5px;"> 
                <a href="<?php echo $link."tambah-ukm.html";?>" >
                    <button class="btn btn-info">
                        <i class="icon-plus">&nbsp;&nbsp;Tambah UKM</i>
                    </button>
                </a>
            </div>
            
        </header>
        
        <div id="div-1" class="accordion-body collapse in body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th style="width:25%; vertical-align:middle; text-align:center;">Nama UKM</th>
                            <th style="width:38%; vertical-align:middle; text-align:center;">Alamat</th>
                            <th style="width:17%; vertical-align:middle; text-align:center;">Pengelola</th>
                            <th style="width:10%; vertical-align:middle; text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($p = mysql_fetch_array($qryKategori)){
                    ?>
                        <tr class="odd gradeX">
                            <td><?php echo $p['1'];?></td>
                            <td><?php echo $p['2'];?></td>
                            <td class="center" ><?php echo $p['3'];?></td>
                            <td class="center" style="text-align:center; vertical-align:middle;">
                            <a style="text-decoration:none;" href="edit-ukm.html?ukm=<?php echo $p['0'];?>">
                              <i class="glyphicon glyphicon-pencil"></i>
                            </a> &nbsp;
                            <a style="text-decoration:none; cursor:pointer;" title="Hapus Kategori"  onclick="return hapus('<?php echo $p['0'];?>')">
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
			content: 'Anda yakin ingin menghapus UKM ini?',
			confirmButton: 'OK',
			confirmButtonClass: 'btn-info',
			icon: 'fa fa-question-circle',
			animation: 'top',
			confirm: function () {
				window.location.href='hapus-ukm.html?ukm='+id;
			}
		});
	}
	
	
	$(document).ready(function () {
		$('#dataTables-example').dataTable();
	});
	
	
	
	
</script>