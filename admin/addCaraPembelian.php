<?php
include ("cekSession.php");
include ("include/conn.php");
?>

<script type="text/javascript" src="jquery-1.7.min.js"></script>
<?php
include ("tiny.php");
?>
<script>
function simpan(){
	var text = document.getElementById("frmCaraPembelian");
	text.submit();
	return (true);
}
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1>Pengaturan Cara Pembelian Barang</h1>
            <hr />
            <?php
			$pesan = $_GET['message'];
			if ($pesan=="error"){
			?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Maaf, Mohon masukkan Cara Pembelian Barang.
                </div>
            <?php
			}
			?>
            <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>TAMBAH PROFIL PEAPEC</h5>
                    <div class="toolbar" style="margin-top:3px; margin-right:5px;">
                        <a style="text-decoration:none;" title="simpan" onClick="return simpan();" >
                            <button class="btn btn-info">
                                <i class="icon-ok"> Simpan</i>
                            </button>
                        </a>
                        <a href="cara-pembelian.html" title="Cancel" >
                            <button class="btn btn-info">
                                <i class="icon-remove"> Batal</i>
                            </button>
                        </a>
                    </div>
                    
                </header>
                
                <div id="div-1" class="accordion-body collapse in body">
                	<form name="frmCaraPembelian" id="frmCaraPembelian" method="post" action="simpan-cara-pembelian.html">
                    	<input type="hidden" name="jenis" value="Simpan" />
                        <textarea class='tinymce' name='txtKet' id="txtKet" style="width:100%; height:350px;"></textarea>
                    </form>
                    
                </div>
                
            </div>
            
    	</div> 
    </div>

<!-- Screenfull -->
