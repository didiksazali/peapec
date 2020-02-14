<?php
include ("cekSession.php");
include ("include/conn.php");
$qryVisi = mysql_query("select * from tbl_informasi where jenis = 'Kontak'");
$r=mysql_fetch_array($qryVisi);
$jum = mysql_num_rows($qryVisi);
$visi = $r['ket'];
?>

    <div class="row">
        <div class="col-lg-12">
        <h1>Pengaturan Kontak</h1>
        <hr />
        <?php
		$pesan = $_GET['message'];
		if ($pesan=="success"){
		?>
			<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Perintah berhasil dilaksanakan
			</div>
		<?php
		}
		?>
    <div class="box dark">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>KONTAK</h5>
            <div class="toolbar" style="margin-top:3px; margin-right:5px;">
                <?php
				if ($jum=="0"){
				?>
                <a href="<?php echo $link."tambah-kontak.html";?>" >
                    <button class="btn btn-info">
                        <i class="icon-plus">&nbsp;&nbsp;Tambah Kontak</i>
                    </button>
                </a>
                <?php
				}else{
				?>
                <a href="<?php echo $link."edit-kontak.html";?>" >
                    <button class="btn btn-info">
                        <i class="icon-pencil">&nbsp;&nbsp;Edit Kontak</i>
                    </button>
                </a>
                <?php
				}
				?>
            </div>
            
        </header>
        
        <div id="div-1" class="accordion-body collapse in body">
            <?php
			if ($jum==0){
				echo "<h3>Tidak ada cara pembelian yang bisa ditampilkan</h3>";
			}else{
				echo $visi; 
			}
			?>
        </div>
    </div>
        </div>
        
    </div>

<!-- Screenfull -->
