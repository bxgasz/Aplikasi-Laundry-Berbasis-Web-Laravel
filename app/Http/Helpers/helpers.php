<?php 
	//membuat format uang indonesia contoh (1.000.000) dll
	function format_uang($angka)
	{
		return number_format($angka,0,',','.');
	}
	//membuat penyebutan angka indonesia contoh(Satu juta)
	function terbilang($angka)
	{
		$angka = abs($angka);
		// untuk membaca angka contoh (1 = satu)
		$baca = array('','satu','dua','tiga','empat','lima','enam','tujuh','delapan','sembilan','sepuluh','sebelas');
		$terbilang ='';

		if ($angka < 12) { // 1 - 11
			$terbilang = '' . $baca[$angka];
		} else if($angka < 20){ // 12- 19
			$terbilang = terbilang($angka -10).' belas';
		}else if($angka < 100){ // 20-99
			$terbilang = terbilang($angka /10).' puluh '.terbilang($angka %10);
		}else if($angka < 200){ //100-199
			$terbilang = 'seratus ' . terbilang($angka -100);
		} else if($angka < 1000){ //999
			$terbilang = terbilang($angka / 100) . ' ratus ' . terbilang($angka % 100);
		} else if($angka < 2000){ // 1.000-1.999
			$terbilang = 'seribu'.terbilang($angka - 1000);
		} else if($angka < 1000000){ //2.000 - 999.999
			$terbilang = terbilang($angka / 1000) . ' ribu ' . terbilang($angka % 1000);
		} else if($angka < 1000000000){ // 1.000.000 - 999.999.999
			$terbilang = terbilang($angka / 1000000) . ' juta ' . terbilang($angka % 1000000);
		}

		return $terbilang;
	}
	//membuat format tanggal indonesia contoh(Sabtu ,24 September 2022)
	function tanggal_indonesia($tgl , $tampil_hari=true)
	{
		$nama_hari = array(1=>
			'Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu','Minggu'
		);
		$nama_bulan = array(1=>
			'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
		);

		$tahun = substr($tgl, 0,4);
		$bulan = $nama_bulan[(int) substr($tgl, 5,2)];
		$tanggal = substr($tgl, 8,2);
		$text = '';

		// menampilkan nama hari beserta tanggal nya
		if ($tampil_hari) {
			$urutan_hari = date('w', mktime(0,0,0,substr($tgl, 5,2), $tanggal, $tahun));
			$hari = $nama_hari[$urutan_hari];
			$text .= "$hari ,$tanggal $bulan $tahun";
		} else {
		$text .= "$tanggal $bulan $tahun";
		}
		return $text;
	}

	function tambah_nol_didepan($value, $threshold = null){
		return sprintf("%0" . $threshold . "s" , $value);
	}
 ?>