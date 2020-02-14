<?php
/*include ("cekSession.php");
if ($menu11=="N"){
	?>
    <script>
	window.location.href = "index.html";
	</script>
    <?php
}*/
?>
<link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
<script type="text/javascript" src="jquery-1.7.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/modal/jquery-confirm.css" />
<script type="text/javascript" src="assets/modal/jquery-confirm.js"></script>

<script>
	function cek(){
		var judul = document.getElementById("txtJudulKategori");
		var ket = document.getElementById("txtKetKategori");
		if (judul.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>JUDUL KATEGORI</code> Pada text field yang di sediakan',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					judul.focus();
				}
			});
			
			return false;
		}else if (ket.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>KETERANGAN KATEGORI</code> Pada text field yang di sediakan',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					ket.focus();
				}
			});
			return false;
		}
	}
</script>
<?php
include ("include/conn.php");
include ("tiny.php");

$judul = $_POST['txtJudulKategori'];
$ket = $_POST['txtKetKategori'];
$tgl = date("Y-m-d");

$idt = date("ymdHis");
$kat = "kat".$idt;
$idKat = md5($kat);

?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Pengaturan Kategori Barang</h1>
            <hr />
            <?php
			if (isset($_POST['tambah'])){
				$qrSimpan = mysql_query("insert into tbl_kategori values('$idKat','$judul','$ket','$tgl')");
				if ($qrSimpan){
					?>
					<script>
						window.location.href="kategori.html?message=success";
					</script>
					<?php
				}else{
					?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Data gagal disimpan. Silakan ulangi proses penyimpanan.
					</div>
					<?php
				}
			}
			?>
            <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>TAMBAH KATEGORI</h5>
                </header>
                
                <div id="div-1" class="accordion-body collapse in body">
                    <form  name="frmKategori"  method="post" action="" onsubmit="return cek();" enctype="multipart/form-data">                        
                        <table width="70%" border="0">
                          <tr style="margin:0px 0px 0px 0px;">
                            <td width="30%" ><label for="txtJudulKategori">Judul Kategori</label></td>
                            <td width="2%">:</td>
                            <td width="68%">
                            	<input type="text" id="txtJudulKategori" name="txtJudulKategori" placeholder="Masukkan Judul Kategori" class="form-control" style="width:80%;" 
                                	value="<?php echo $judul; ?>" />
                            </td>
                          </tr>
                          <tr style="margin:0px 0px 0px 0px;">
                            <td width="30%" style="vertical-align:top;" ><label for="txtKetKategori">Keterangan Kategori</label></td>
                            <td width="2%" style="vertical-align:top;">:</td>
                            <td width="68%">
                            	<textarea id="txtKetKategori" name="txtKetKategori" placeholder="Masukkan Keterangan Untuk Kategori baru" class="form-control" style="height:100px;"><?php echo $ket; ?></textarea>
                            </td>
                          </tr>
                        </table>
                        <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-sm btn-rect" onclick="javascript: window.location.href='<?php echo $link."kategori.html";?>'">
                                <i class="glyphicon glyphicon-remove"></i> Batal
                            </button>
                            <button type="submit" name="tambah" class="btn btn-primary btn-sm btn-rect">
                                <i class="glyphicon glyphicon-floppy-save "></i>  Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    	</div> 
    </div>

<!-- Screenfull -->
<script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
