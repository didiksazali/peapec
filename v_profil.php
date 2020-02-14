<?php
include ("include/conn.php");
$id = $_GET['idproduk'];

?>

<div class="center_title_bar">Profil Peapec</div>
  <div class="prod_box_big">
    <div class="top_prod_box_big"></div>
    <div class="center_prod_box_big" style="text-align:justify; padding-left:10px;">
    <?php
	$qry = mysql_query("select * from tbl_informasi where jenis = 'Profil'");
	$t = mysql_fetch_array($qry);
	echo $t['ket'];
	?>
    </div>
    <div class="bottom_prod_box_big"></div>
</div>

