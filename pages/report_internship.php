<?php
	require_once('./html2pdf/html2pdf.class.php');
	require_once('./class/class.Internship.php');
	$judul = 'LAPORAN DATA Internship';
	$content = '<h1>'.$judul.'</h1>';

	$objInternship = new Internship();
	$objInternship->idInternship = $_GET['idInternship'];
	$objInternship->SelectInternshipDownload();

	$content .= '<h2 style="margin-bottom: -20px">Topik</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->topik.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Nama</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->name.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Alamat</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->address.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Angkatan</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->angkatan.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Tahun</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->tahun.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Kelamin</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->gender.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Tanggal Lahir</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->bdate.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Jurusan</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->nameMajor.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Perusahaan</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->nameCompany.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Profile Perusahaan</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->profile.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Supervisor</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->supervisor.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Latar Belakang</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->background.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Tujuan</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->goal.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Ruang Lingkup</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->ruangLingkup.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Deskripsi Magang</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->jobDesc.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Posisi Magang</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->position.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Waktu Magang</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->startTime.' sampai '.$objInternship->endTime.'</p>';

	$content .= '<h2 style="margin-bottom: -20px">Lama Magang</h2>';
	$content .= '<p style="font-size: 20px">'.$objInternship->duration.' Bulan</p>';

	$html2pdf = new HTML2PDF('L', 'A4', 'fr');
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	ob_end_clean();
	$html2pdf->Output($judul.'.pdf');	
?>