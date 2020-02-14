<?php
include ("cekSession.php");
include ("include/conn.php");

$qryVisi = mysql_query("select * from tbl_informasi where jenis = 'Vision and Mission'");
$r=mysql_fetch_array($qryVisi);
$jum = mysql_num_rows($qryVisi);
$visi = $r['ket'];
?>

<script type="text/javascript" src="jquery-1.7.min.js"></script>
<?php
include ("tiny.php");
?>
<script>

function simpan(){
	var text = document.getElementById("frmVisi");
	text.submit();
	return (true);
}



</script>
<?php
$pesan = $_GET['message'];
?>

    <div class="row">
        <div class="col-lg-12">
            <h1>Setting the Vision and Misson</h1>
          <hr />
            <?php
			if ($pesan=="error"){
			?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Sorry, Please enter the vision dan mission into the text area</div>
            <?php
			}
			?>
            <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>EDIT VISION AND MISSION</h5>
                    <div class="toolbar" style="margin-top:3px; margin-right:5px;">
                        <a style="text-decoration:none;" title="Simpan" onClick="return simpan();" >
                            <button class="btn btn-info">
                                <i class="icon-ok"> Save</i>
                            </button>
                        </a>
                        <a href="vision-mission.html" title="Cancel" >
                            <button class="btn btn-info">
                                <i class="icon-remove"> Cancel</i>
                            </button>
                        </a>
                    </div>
                    
                </header>
                
                <div id="div-1" class="accordion-body collapse in body">
                    <form name="frmVisi" id="frmVisi" method="post" action="save-vision-mission.html">
                    	<input type="hidden" name="jenis" value="Edit" />
                    	<textarea class='tinymce' name='txtKet' id="txtKet" style="width:100%; margin-right:10px; height:500px;"><?php echo $visi;?></textarea>
                    </form>
                </div>
            </div>
    	</div> 
    </div>

<!-- Screenfull -->
