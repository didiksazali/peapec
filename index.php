<?php
include ("include/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PeApEc</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/slider.css" />
<link rel="stylesheet" type="text/css" href="css/pictogram-button.css" />
<link rel="stylesheet" type="text/css" href="css/paging.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.immersive-slider.js"></script>
<link href='css/immersive-slider.css' rel='stylesheet' type='text/css'>
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>
</head>
<body>
<div id="main_container">
  
  <div id="menu_tab">
      <div class="left_menu_corner"></div>
      <ul class="menu">
        <li><a href="index.html" class="nav1"> Home</a></li>
        <li class="divider"></li>
        <li><a href="profil.html" class="nav3">Profil</a></li>
        <li class="divider"></li>
        <li><a href="cara-pembelian.html" class="nav4">Cara Pembelian</a></li>
        <li class="divider"></li>
        <li><a href="kontak.html" class="nav6"> Kontak Kami</a></li>

        <div class="top_search">
          <div class="search_text"><a href="#">Cari Produk</a></div>
          <input type="text" class="search_input" name="search" />
          <input type="image" src="css/images/search.gif" class="search_bt"/>
        </div>
      </ul>
      <div class="right_menu_corner"></div>
    </div>
  <div id="header">
    
    <div class="oferte_content">
      
      <div class="oferta" style="max-height:100px;" >
        <div class="utama">
          <div class="page_container">
            <div id="immersive_slider">
              
              <div class="slide" data-blurred="images/slider/produk1.jpg"><!--Blured-->
                <div class="content">
                  <h2><a href="" target="_blank">Belacan Pasta</a></h2>
                  <p>Terasi atau belacan adalah bumbu masak yang dibuat dari ikan dan/atau udang rebon yang difermentasikan, berbentuk seperti adonan atau pasta dan berwarna hitam-coklat</p>
                </div>
                <div class="image">
                 <a href="" target="_blank"> <img src="images/slider/produk1.jpg" alt="Slider 1"></a>
                </div>
              </div>
              <div class="slide" data-blurred="images/slider/produk2.jpg"><!--Blured-->
                <div class="content">
                  <h2><a href="" target="_blank">Belacan Serbuk</a></h2>
                  <p>Terasi atau belacan adalah bumbu masak yang dibuat dari ikan dan/atau udang rebon yang difermentasikan, berbentuk seperti adonan atau pasta dan berwarna hitam-coklat</p>
                </div>
                <div class="image">
                  <a href="" target="_blank"><img src="images/slider/produk2.jpg" alt="Slider 1"></a>
                </div>
              </div>
              <div class="slide" data-blurred="images/slider/produk3.jpg"><!--Blured-->
                <div class="content">
                  <h2><a href="" target="_blank">Bubuk Belacan</a></h2>
                  <p>Terasi atau belacan adalah bumbu masak yang dibuat dari ikan dan/atau udang rebon yang difermentasikan, berbentuk seperti adonan atau pasta dan berwarna hitam-coklat</p>
                </div>
                <div class="image">
                  <a href="" target="_blank"><img src="images/slider/produk3.jpg" alt="Slider 1"></a>
                </div>
              </div>
              
              <a href="#" class="is-prev">&laquo;</a>
              <a href="#" class="is-next">&raquo;</a>
            </div>
          </div>
  	</div>
      </div>
      <div class="top_divider"><img src="css/images/header_divider.png" alt="" /></div>
    </div>
    <div id="logo"> <a href="#"><img src="css/images/LOGO-UKM2.png" alt="" border="0" width="280" height="140"  /></a> </div>
    <!-- end of oferte_content-->
  </div>
  <div id="main_content">
    
    
    <div class="left_content">
      <div class="title_box">Kategori Barang</div>
      <ul class="left_menu">
      	<?php
		$qryKategori = mysql_query("select * from tbl_kategori order by tgl_kategori asc");
		while ($rKat = mysql_fetch_array($qryKategori)){
		?>
        <li class="odd"><a href="produk-kategori.html?kategori=<?php echo $rKat['0'];?>"><?php echo $rKat['1'];?></a></li>
        <?php
		}
		?>
      </ul>
      <div class="title_box">Usaha Kecil Menengah (UKM)</div>
      <ul class="left_menu">
      	<?php
		$qryUkm = mysql_query("select * from tbl_ukm");
		while ($v = mysql_fetch_array($qryUkm)){
		?>
        <li class="odd"><a href="produk-ukm.html?ukm=<?php echo $v['id_ukm'];?>"><?php echo $v['nama_ukm'];?></a></li>
        <?php
		}
		?>
      </ul>
      
      
    </div>
    <!-- end of left content -->
    <div class="center_content">
      <?php
	  	include ("page.php");
	  ?>
    </div>
    <!-- end of center content -->
    <div class="right_content">
      <div class="shopping_cart">
        <div class="cart_title">Keranjang Belanja</div>
        <div class="cart_details"> 3 item <br />
          <span class="border_cart"></span> Total: <span class="price">Rp. 175.000,-</span> </div>
        <div class="cart_icon"><a href="#" title="header=[Checkout] body=[&nbsp;] fade=[on]"><img src="images/shoppingcart.png" alt="" width="48" height="48" border="0" /></a></div>
      </div>
      
      <div class="title_box">Member Login</div>
      <div class="border_box" style="height:180px;">
      	<form name="frmLogin" action="" method="post" enctype="multipart/form-data">
            <input type="email" name="txtEmail" class="newsletter_input" value="your email" required/>
            <input type="password" name="txtPassword" class="newsletter_input" value="your email" required />
        </form>
        <a href="" class="button-bevel cyan" style="width:110px; height:7px; text-align:left; padding-left:5px; margin-right:0px;" ><span class="users" style="height:10px; width:10px;"></span>Masuk</a><br /> 
        <a href="" class="button-bevel green" style="width:110px; height:7px; text-align:left; padding-left:5px; margin-right:0px;"><span class="adduser" style="height:10px; width:10px;"></span>Daftar Member</a> 
        <br />

      </div>
      
      
      <div class="title_box">Produk Baru</div>
      <div class="border_box">
        <div class="product_title"><a href="details.html">Belacan Pasta</a></div>
        <div class="product_img"><a href="details.html"><img src="produk/produk1.jpg" alt="" border="0" width="99" height="87" /></a></div>
        <div class="prod_price"><!--<span class="reduce">Rp. 30.000,-</span> --><span class="price">Rp. 20.000,-</span></div>
      </div>
      
      <div class="title_box">Produk Khusus</div>
      <div class="border_box">
        <div class="product_title"><a href="details.html">Belacan Serbuk Melaka</a></div>
        <div class="product_img"><a href="details.html"><img src="produk/produk3.jpg" alt="" border="0" width="99" height="87" /></a></div>
        <div class="prod_price"><span class="reduce">Rp. 70.000,-</span> <span class="price">Rp. 45.000,-</span></div>
      </div>
      
      <div class="banner_adds"> <a href="#"><img src="images/bann1.jpg" alt="" border="0" /></a> </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="left_footer">
        <div class="logo" style="margin-top:10px;">
            <img src="images/logo/logo-bni.jpg" alt="" height="40" width="141" /> 
            <img src="images/logo/logo-bri.jpg" alt="" height="40" width="141" />
            <img src="images/logo/logo-mandiri.png" alt="" height="40" width="141" />
            <img src="images/logo/logo-bca.png" alt="" height="40" width="141" />  
        </div>    
    </div>
    
    <div class="right_footer">Design By Peapec Bengkalis. All Rights Reserved 2015<br /><br />
        <img src="images/payment.gif" alt="" height="20" width="141" />
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready( function() {
	$("#immersive_slider").immersive_slider({
	  container: ".utama"
	});
  });

</script>
<!-- end of main_container -->
</body>
</html>
