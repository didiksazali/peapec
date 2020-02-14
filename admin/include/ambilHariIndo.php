<?php
    //input tanggal hari ini
    //konversi ke fungsi tanggal
	function ambilHari($tanggal){
		
    $ts = strtotime($tanggal);
    //tanggal dipecah menurut hari bulan tahun
    $hari=date('w', $ts);
    $tgl =date('d', $ts);
    $bln =date('m', $ts);
    $thn =date('Y', $ts);
    //pemberian nama hari Indonesia
        switch($hari){       
            case 0 : {
                    $hari='Minggu';
            }break;
            case 1 : {
                $hari='Senin';
            }break;
            case 2 : {
                $hari='Selasa';
            }break;
            case 3 : {
                $hari='Rabu';
            }break;
            case 4 : {
                $hari='Kamis';
            }break;
            case 5 : {
                $hari="Jum'at";
            }break;
            case 6 : {
                $hari='Sabtu';
            }break;
            //pemberian nama default jika tidak ada nama bulan
            default: {
                $hari='Tidak Terdeteksi';
            }break;
        }
        //pemberian nama bulan Indonesia               
        switch($bln){       
            case 1 : {
                $bln='Januari';
            }break;
            case 2 : {
                $bln='Februari';
            }break;
            case 3 : {
                $bln='Maret';
            }break;
            case 4 : {
                $bln='April';
            }break;
            case 5 : {
                $bln='Mei';
            }break;
            case 6 : {
                $bln="Juni";
            }break;
            case 7 : {
                $bln='Juli';
            }break;
            case 8 : {
                $bln='Agustus';
            }break;
            case 9 : {
                $bln='September';
            }break;
            case 10 : {
                $bln='Oktober';
            }break;       
            case 11 : {
                $bln='November';
            }break;
            case 12 : {
                $bln='Desember';
            }break;
            //pemberian nama default jika tidak ada nama bulan
            default: {
                $bln='Tidak Terdeteksi';
            }break;
        }
		
		return $hari.', '.$tgl.'-'.$bln.'-'.$thn;
	}
       // echo 'hari '.$hari.', '.$tgl.' '.$bln.' '.$thn;
?>
