<?php
	session_name("akses");
	session_start();
	$inactive = 120;
// check to see if $_SESSION['timeout'] is set

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    // request 30 minates ago
    session_destroy();
    session_unset();
	//session_destroy(); header("Location: keluar.html"); 
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time

	
	$akses = $_SESSION['hak_akses'];
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$nama = $_SESSION['nama'];
	if ($akses == ''){
	?>
		<script>
        window.location.href='masuk.html';
        </script>
	<?php
	}
	?>