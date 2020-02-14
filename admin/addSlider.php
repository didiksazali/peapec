<?php
include ("cekSession.php");
include ("include/conn.php");
include "include/upload_image.php";
include ("tiny.php");

?>
<link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
<script type="text/javascript" src="jquery-1.7.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/modal/jquery-confirm.css" />
<script type="text/javascript" src="assets/modal/jquery-confirm.js"></script>

<script>
	function cek(){
		var judul = document.getElementById("txtJudulFoto");
		var file = document.getElementById("fileFoto");
		var ket = document.getElementById("txtKetFoto");
		if (judul.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>Judul Foto</code> pada text field yang di sediakan',
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
		}else if (file.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>Foto</code>',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					file.focus();
				}
			});
			return false;
		}else if (ket.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>Keterangan</code> untuk foto yang akan di Upload',
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

$judulFoto = $_POST['txtJudulFoto'];
$namaFoto = $_FILES['fileFoto']['name'];
$lokasiFoto = $_FILES['fileFoto']['tmp_name'];
$ket= $_POST['txtKetFoto'];

$namaSimpan = "slider_".$namaFoto;
$tgl = date("Y-m-d");

?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Pengaturan Slider</h1>
            <hr />
            <?php
			if (isset($_POST['tambah'])){
				$qrSimpan = mysql_query("insert into tbl_slider values('','$judulFoto','$namaSimpan','$ket','$tgl')");
				if ($qrSimpan){
					UploadSlider($namaFoto, $lokasiFoto);
					?>
					<script>
						window.location.href="slider.html?message=success";
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
                    <h5>TAMBAH SLIDER</h5>
                </header>
                
                <div id="div-1" class="accordion-body collapse in body">
                    <form  name="frmMisi"  method="post" action="" onsubmit="return cek();" enctype="multipart/form-data">                        
                        <table width="70%" border="0">
                          <tr style="margin:0px 0px 0px 0px;">
                            <td width="30%" ><label for="txtNamaSosok">Judul Slider</label></td>
                            <td width="2%">:</td>
                            <td width="68%">
                            	<input type="text" id="txtJudulFoto" name="txtJudulFoto" placeholder="Masukkan Judul Foto" class="form-control" style="width:80%;" 
                                	value="<?php echo $judulFoto; ?>" />
                            </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:top;"><label for="fileFoto">Foto Slider</label></td>
                            <td style="vertical-align:top;">:</td>
                            <td>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" name="fileFoto" id="fileFoto" accept="image/x-png, image/jpeg" />
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                            </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:top;"><label for="txtKetFoto">Keterangan Slider</label></td>
                            <td style="vertical-align:top;">:</td>
                            <td>
                            	<textarea  name="txtKetFoto" id="txtKetFoto" class="form-control" ><?php echo $ket; ?></textarea>
                            </td>
                          </tr>
                        </table>
                        <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-sm btn-rect" onclick="javascript: window.location.href='<?php echo $link."slider.html";?>'">
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
