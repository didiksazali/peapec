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
	var text = document.getElementById("frmVisi");
	text.submit();
	return (true);
}
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1>Setting the Vision and Misson</h1>
            <hr />
            <?php
			$pesan = $_GET['message'];
			if ($pesan=="error"){
			?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Sorry, Please enter the vision dan mission into the text area
                </div>
            <?php
			}
			?>
            <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>ADD VISION AND MISSION</h5>
                    <div class="toolbar" style="margin-top:3px; margin-right:5px;">
                        <a style="text-decoration:none;" title="simpan" onClick="return simpan();" >
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
                    	<input type="hidden" name="jenis" value="Simpan" />
                        <textarea class='tinymce' name='txtKet' id="txtKet" style="width:100%; height:1000px;"></textarea>
                    </form>
                    
                </div>
                
            </div>
            
    	</div> 
    </div>

<!-- Screenfull -->
