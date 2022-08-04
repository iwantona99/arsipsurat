<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$tanggalmasuk_suratmasuk	        = mysqli_real_escape_string($db,$_POST['tanggalmasuk_suratmasuk']);
	$kode_suratmasuk	                = mysqli_real_escape_string($db,$_POST['kode_suratmasuk']);
    $nomorurut_suratmasuk               = mysqli_real_escape_string($db,$_POST['nomorurut_suratmasuk']);
	$nomor_suratmasuk	                = mysqli_real_escape_string($db,$_POST['nomor_suratmasuk']);
	$tanggalsurat_suratmasuk            = mysqli_real_escape_string($db,$_POST['tanggalsurat_suratmasuk']);
    $pengirim                           = mysqli_real_escape_string($db,$_POST['pengirim']);
	$kepada_suratmasuk		            = mysqli_real_escape_string($db,$_POST['kepada_suratmasuk']);
	$perihal_suratmasuk   	            = mysqli_real_escape_string($db,$_POST['perihal_suratmasuk']);
    $operator	                        = mysqli_real_escape_string($db,$_POST['operator']);
	

        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
	
	$nama_file_lengkap 		= $_FILES['file_suratmasuk']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['file_suratmasuk']['type'];
	$ukuran_file 	= $_FILES['file_suratmasuk']['size'];
	$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
	
    $tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
    $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
    
	
    if (!($tgl_masuk=='') and !($kode_suratmasuk =='') and !($nomorurut_suratmasuk  =='') and !($nomor_suratmasuk =='') and !($tgl_surat =='') and !($pengirim =='')  and !($kepada_suratmasuk =='') and !($perihal_suratmasuk =='') and !($operator =='') and !($tanggal_entry =='') and   
		($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){		
		
		$nama_baru = $thnNow.'-'.$nomorurut_suratmasuk . $ext_file;
		$path = "../surat_masuk/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_suratmasuk(tanggalmasuk_suratmasuk, kode_suratmasuk, nomorurut_suratmasuk, nomor_suratmasuk, tanggalsurat_suratmasuk, pengirim, kepada_suratmasuk, perihal_suratmasuk, file_suratmasuk, operator, tanggal_entry)
				values ('$tgl_masuk', '$kode_suratmasuk', '$nomorurut_suratmasuk ', '$nomor_suratmasuk', '$tgl_surat', '$pengirim', '$kepada_suratmasuk', '$perihal_suratmasuk', '$nama_baru', '$operator', '$tanggal_entry')";
		$execute = mysqli_query($db, $sql);
		
		echo "<Center><h2><br>Terima Kasih<br>Surat masuk Telah Dimasukkan</h2></center>
			<meta http-equiv='refresh' content='2;url=../datasuratmasuk.php'>";
	}
	else{
		echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../inputsuratmasuk.php'>";
	}
	
?>
	