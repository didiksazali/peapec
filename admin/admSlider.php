<?php
include ("cekSession.php");
include ("include/conn.php");
include ("include/fungsi_indotgl.php");
include ("include/ambilHariIndo.php");
include ("include/tanggal.php");
$qrySlider = mysql_query("select * from tbl_slider order by tgl_slider desc");
$jum = mysql_num_rows($qrySlider);

?>
<script type="text/javascript" src="jquery-1.7.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/modal/jquery-confirm.css" />
<script type="text/javascript" src="assets/modal/jquery-confirm.js"></script>


<link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <div class="row">
        <div class="col-lg-12">
        <h1>Pengaturan Slider</h1>
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
            <h5>SLIDER</h5>
            <div class="toolbar" style="margin-top:3px; margin-right:5px;"> 
                <a href="<?php echo $link."tambah-slider.html";?>" >
                    <button class="btn btn-info">
                        <i class="icon-plus">&nbsp;&nbsp;Tambah Slider</i>
                    </button>
                </a>
            </div>
            
        </header>
        
        <div id="div-1" class="accordion-body collapse in body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th style="width:30%; vertical-align:middle; text-align:center;">Judul Slider</th>
                            <th style="width:42%; vertical-align:middle; text-align:center;">Gambar</th>
                            <th style="width:17%; vertical-align:middle; text-align:center;">Tanggal <br /> Posting</th>
                            <th style="width:10%; vertical-align:middle; text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($p = mysql_fetch_array($qrySlider)){
                    ?>
                        <tr class="odd gradeX">
                            <td><?php echo $p['judul_slider'];?></td>
                            <td style="text-align:center;">
                            <img src="../images/slider/<?php echo $p['foto_slider']; ?>" width="271" height="88" />
        </td>
                            <td class="center">
                            <?php
                            $tanggal = $p['tgl_slider'];
                            echo tgl_indo($tanggal);
                            ?>
                            </td>
                            <td class="center" style="text-align:center; vertical-align:middle;">
                            <a style="text-decoration:none;" href="<?php echo $link."edit-slider.html?id=". $p['id_slider'];?>">
                              <i class="glyphicon glyphicon-pencil"></i>
                            </a> &nbsp;
                            <a style="text-decoration:none; cursor:pointer;" title="Hapus Perda"  onclick="return hapus(<?php echo $p['id_slider'];?>)">
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
			content: 'Anda yakin ingin menghapus data ini?',
			confirmButton: 'OK',
			confirmButtonClass: 'btn-info',
			icon: 'fa fa-question-circle',
			animation: 'top',
			confirm: function () {
				window.location.href='hapus-slider.html?id='+id+'&action=delete';
			}
		});
	}
	
	function publish(id){
		window.location.href='publish-slider.html?id='+id+'&action=Publish';
	}
	
	function unpublish(id){
		window.location.href='unpublish-slider.html?id='+id+'&action=Unpublish';
	}
	$(document).ready(function () {
		$('#dataTables-example').dataTable();
	});
	
	
	
	
</script>