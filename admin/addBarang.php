<?php
include ("cekSession.php");
/*if ($menu11=="N"){
	?>
    <script>
	window.location.href = "index.html";
	</script>
    <?php
}*/
include ("include/conn.php");
include "include/upload_image.php";
include ("tiny.php");

?>
<link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
<script type="text/javascript" src="jquery-1.7.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/modal/jquery-confirm.css" />
<script type="text/javascript" src="assets/modal/jquery-confirm.js"></script>

<script>
	var _validFileExtensions = [".jpg", ".png", ".gif"];  
	function ValidateSingleInput(oInput) {
		if (oInput.type == "file") {
			var sFileName = oInput.value;
			 if (sFileName.length > 0) {
				var blnValid = false;
				for (var j = 0; j < _validFileExtensions.length; j++) {
					var sCurExtension = _validFileExtensions[j];
					if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
						blnValid = true;
						break;
					}
				}
				if (!blnValid) {
					alert("Maaf, " + sFileName + " tidak termasuk dalam tipe file yang dibenarkan untuk di Upload. Untuk mengupload gambar, tipe file yang diperbolehkan adalah: " + _validFileExtensions.join(", "));
					oInput.value = '';
				}
			}
		}
	}
	function cek(){
		var namaBarang = document.getElementById("txtNamaBarang");
		var kategori = document.getElementById("cmbKategori");
		var ukm = document.getElementById("cmbUKM");
		var hargaNormal = document.getElementById("txtHargaNormal");
		var ket = document.getElementById("txtKet");
		var file = document.getElementById("fileFoto");
		if (namaBarang.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>NAMA BARANG</code> pada text field yang di sediakan',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					namaBarang.focus();
				}
			});
			
			return false;
		}else if (kategori.value == 0){
			$.alert({
				title: 'Error!',
				content: 'Pilih <code>KATEGORI BARANG</code> dari daftar kategori',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					kategori.focus();
				}
			});
			
			return false;
		}else if (ukm.value == 0){
			$.alert({
				title: 'Error!',
				content: 'Pilih <code>NAMA UKM</code> dari daftar kategori',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					ukm.focus();
				}
			});
			
			return false;
		}else if (hargaNormal.value == ""){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>HAHRGA BARANG</code> untuk melanjutkan',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					hargaNormal.focus();
				}
			});
			
			return false;
		}else if (ket.value == ""){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>KETERANGAN BARANG</code> untuk melanjutkan',
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
		}else if (file.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>Foto</code> untuk melanjutkan',
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
		}
	}
</script>

<?php

$namaBarang = $_POST['txtNamaBarang'];
$kategori = $_POST['cmbKategori'];
$ukm = $_POST['cmbUKM'];
$hargaNormal = $_POST['txtHargaNormal'];
$diskon = $_POST['txtHargaDiskon'];
if ($diskon == ""){
	$hargaDiskon = "-";
}else{
	$hargaDiskon = $_POST['txtHargaDiskon'];
}
$ket = $_POST['txtKet'];

$namaFoto = $_FILES['fileFoto']['name'];
$lokasiFoto = $_FILES['fileFoto']['tmp_name'];
$namaSimpan = "produk_".$namaFoto;
$tgl = date("Y-m-d");


$idt = date("ymdHis");
$produk = "produk".$idt;
$idProduk = md5($produk);

?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Pengaturan Produk</h1>
          <hr />
            <?php
			if (isset($_POST['tambah'])){
				$qrSimpan = mysql_query("insert into tbl_barang
										 values('$idProduk','$kategori','$ukm','$namaBarang','$hargaNormal','$hargaDiskon','$ket','$tgl','$namaSimpan')");
				if ($qrSimpan){
					UploadImage($namaFoto, $lokasiFoto);
					?>
					<script>
						window.location.href="barang.html";
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
                    <h5>TAMBAH PRODUK</h5>
                </header>
                
                <div id="div-1" class="accordion-body collapse in body">
                    <form  name="frmMisi"  method="post" action="" onsubmit="return cek();" enctype="multipart/form-data">                        
                        <table width="70%" border="0">
                          <tr style="margin:0px 0px 0px 0px;">
                            <td width="30%" ><label for="txtNamaSosok">Nama Produk</label></td>
                            <td width="2%" valign="middle">:</td>
                            <td width="68%">
                            	<input name="txtNamaBarang" type="text" class="form-control" id="txtNamaBarang" style="width:80%;" 
                                	value="<?php echo $namaBarang; ?>" maxlength="100" placeholder="Masukkan Nama Produk" />
                            </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle;"><label for="cmbKategori">Kategori Produk</label></td>
                            <td style="vertical-align:middle;">:</td>
                            <td>
                            <select name="cmbKategori" class="form-control" id="cmbKategori" style="width:50%;">
                            	<option value="0">-Pilih Kategori-</option>
                                <?php
								$qryKat = mysql_query("select * from tbl_kategori");
								while($rKat = mysql_fetch_array($qryKat)){
									?>
                                    <option value="<?php echo $rKat['0'];?>" <?php if ($rKat['0'] == $kategori) echo "selected = 'selected'";?> ><?php echo $rKat['1'];?></option>
                                    <?php
								}
								?>
                            </select>
                            </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle;"><label for="cmbUKM">UKM</label></td>
                            <td style="vertical-align:middle;">:</td>
                            <td>
                            <select name="cmbUKM" class="form-control" id="cmbUKM" style="width:50%;">
                            	<option value="0">-Pilih UKM-</option>
                                <?php
								$qryUkm = mysql_query("select * from tbl_ukm");
								while($rUkm = mysql_fetch_array($qryUkm)){
									?>
                                    <option value="<?php echo $rUkm['0'];?>" <?php if ($rUkm['0'] == $ukm) echo "selected = 'selected'";?>><?php echo $rUkm['1'];?></option>
                                    <?php
								}
								?>
                            </select>
                            </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle;"><label for="txtHargaNormal">Harga Normal</label></td>
                            <td style="vertical-align:middle;">:</td>
                            <td>Rp. <input name="txtHargaNormal" type="text" class="form-control" id="txtHargaNormal" style="width:30%;" 
                            	value="<?php echo $hargaNormal; ?>" maxlength="8" placeholder="Masukkan Harga Normal" />
                             </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:middle;"><label for="txtHargaDiskon">Harga Diskon</label></td>
                            <td style="vertical-align:middle;">:</td>
                            <td>
                            Rp. <input name="txtHargaDiskon" type="text" class="form-control" id="txtHargaDiskon" style="width:30%;" 
                            	value="<?php echo $diskon; ?>" maxlength="8" placeholder="Masukkan Harga Diskon" />
                            </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:top;"><label for="txtKetBarang">Keterangan</label></td>
                            <td style="vertical-align:top;">:</td>
                            <td>
                            <textarea name="txtKet" maxlength="200" class="form-control" id="txtKet" style="width:70%; height:150px;" placeholder="Masukkan Keterangan Barang"><?php echo $ket;?></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:top;"><label for="fileFoto">Foto</label></td>
                            <td style="vertical-align:top;">:</td>
                            <td>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="max-width:200px; max-height:150px;">
                               	  <img src="../images/barang/no_image.jpg" alt="" style="max-width:200px; max-height:150px;" />
                            </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                          <div>
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" name="fileFoto" id="fileFoto" accept="image/x-png, image/jpeg" onChange="ValidateSingleInput(this)" />
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                            </td>
                          </tr>
                          
                        </table>
              <br />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-sm btn-rect" onclick="javascript: window.location.href='barang.html'">
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
