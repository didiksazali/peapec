<?php
//Fungsi untuk meng-upload gambar
function UploadImage($img_name, $lokasiGambar){

//direktori gambar
$vdir_upload = "../produk/";
$vfile_upload = $vdir_upload . $img_name;

//Simpan gambar dalam ukuran sebenarnya
move_uploaded_file($lokasiGambar, $vfile_upload);

//identitas file asli
$im_src = imagecreatefromjpeg($vfile_upload);
$src_width = imageSX($im_src);
$src_height = imageSY($im_src);

//Simpan dalam versi small 110 pixel
//set ukuran gambar hasil perubahan
$dst_width = 550;
$dst_height = ($dst_width/$src_width)*$src_height;

//proses perubahan ukuran
$im = imagecreatetruecolor($dst_width,$dst_height);
imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

//Simpan gambar
imagejpeg($im,$vdir_upload . "produk_" . $img_name);

unlink("../produk/".$img_name);

imagedestroy($im_src);
imagedestroy($im);
}
