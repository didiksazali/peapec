<?php
include ("cekSession.php");
include ("include/conn.php");
?>
<script type="text/javascript" src="jquery-1.7.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/modal/jquery-confirm.css" />
<script type="text/javascript" src="assets/modal/jquery-confirm.js"></script>

<script>
	function cek(){
		var username = document.getElementById("txtUsername");
		var pass1 = document.getElementById("txtPass1");
		var pass2 = document.getElementById("txtPass2");
		var passLama = document.getElementById("txtPassLama");
		
		if (username.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>Username</code> Pada text field yang di sediakan',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					username.focus();
				}
			});
			
			return false;
		}
		if (pass1.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>Password Baru</code> Pada text field yang di sediakan',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					pass1.focus();
				}
			});
			
			return false;
		}
		if (pass2.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan Kembali <code>Password Baru</code> Pada text field yang di sediakan',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					pass2.focus();
				}
			});
			
			return false;
		}
		if (passLama.value.length<=0){
			$.alert({
				title: 'Error!',
				content: 'Masukkan <code>Password Yang Digunakan</code> Pada text field yang di sediakan',
				confirmButton: 'okay',
				confirmButtonClass: 'btn-info',
				animation: 'bottom',
				
				theme: 'black',
				icon: 'fa fa-check',
				backgroundDismiss: false,
				confirm: function(){
					passLama.focus();
				}
			});
			
			return false;
		}
	}
</script>
<?php

$usernameBaru = $_POST['txtUsername'];
$pass = $_POST['txtPass1'];
$pass1 = md5($_POST['txtPass1']);
$pass2 = md5($_POST['txtPass2']);
$passLama = md5($_POST['txtPassLama']);


?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Pengaturan Administrator</h1>
            <hr />
            <?php
			if (isset($_POST['tambah'])){
				if ($pass1 != $pass2){
					?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Maaf, Password baru yang anda masukkan tidak sama. Mohon diperiksa lagi password baru yang anda masukkan!
                    </div>
                    <?php
				}elseif($passLama != $password){
					?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Maaf, yang sedang aktif salah. Mohon masukkan Password yang sedang digunakan dengan benar.
                    </div>
                    <?php
				}else{
					$qry = mysql_query("update tbl_login set user= '$usernameBaru', pass = '$pass', pas_enc='$pass1' where user='$username' and pas_enc='$passLama' ");
					if ($qry){
						
						
						$_SESSION['hak_akses']="Administrator";
						$_SESSION['username'] = $usernameBaru;
						$_SESSION['password'] = $pass1;
						unset($_SESSION["akses"]);
					  ?>
					  	<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Selamat, Username dan Password Berhasil Dirubah
                    	</div>
					  <?php
					}else{
					  ?>
					  <div class="alert alert-danger" style="margin:5px 5px 5px 5px;">
						  <i class="fa fa-ban"></i>
						  <b>Maaf!</b> Gagal Merubah Username dan Password
					  </div>
					  <?php
					}
					
				}
			}
			?>
            <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>PENGATURAN ADMIN</h5>
                </header>
                
                <div id="div-1" class="accordion-body collapse in body">
                    <form  name="frmMisi"  method="post" action="" onsubmit="return cek();" enctype="multipart/form-data">
                    	<div class="form-group">
                            <div class="input-group" >
                                <span class="input-group-addon" style="width:150px; text-align:justify;">Username Baru</span>
                                <input type="text" class="form-control" name="txtUsername" id="txtUsername" style="width:500px;" value="<?php echo $usernameBaru; ?>"/>
                            </div>
          				</div>
                       	<div class="form-group">
                            <div class="input-group" >
                                <span class="input-group-addon" style="width:150px; text-align:justify;">Masukkan Password Baru</span>
                                <input type="password" class="form-control" name="txtPass1" id="txtPass1" style="width:300px;" />
                        	</div>
                        </div>
                        <div class="form-group">
                            <div class="input-group" >
                                <span class="input-group-addon" style="width:150px; text-align:justify;">Masukkan Password Baru Kembali</span>
                                <input type="password" class="form-control" name="txtPass2" id="txtPass2" style="width:300px;" />
                        	</div>
                        </div>
                        <div class="form-group">
                            <div class="input-group" >
                                <span class="input-group-addon" style="width:150px; text-align:justify;">Masukkan Password yang Sedang Aktif</span>
                                <input type="password" class="form-control" name="txtPassLama" id="txtPassLama" style="width:300px;" />
                        	</div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-sm btn-rect" onclick="javascript: window.location.href='<?php echo $link."index.html";?>'">
                                <i class="glyphicon glyphicon-remove"></i> Close
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
