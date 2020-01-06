<?php 

class Sikap{

		public $host, $user, $pass, $db, $hasil, $konek; 

		function __construct(){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db   = "sikap";
		}

		public function koneksi(){ 
			$this->konek = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

				if(!$this->konek){
					return die('Maaf koneksi belum tersambung'.mysqli_connect_error());
				}
		}

		public function eksekusi($query){ 
			$this->hasil = mysqli_query($this->konek, $query);
		}

		//login
		public function login($username){
			
			$query = "SELECT * from login where user_name=$username";
			$this->eksekusi($query);
			return $this->hasil;
		}

		public function akun($username){ //rizal
			
			$query = "SELECT * FROM akun WHERE username='$username'";
			$this->eksekusi($query);
			return $this->hasil;
		}
		public function ubahpass($password,$username){ //rizal
			
			$query = "UPDATE akun set password='$password' where username='$username'";
			$this->eksekusi($query);
			return $this->hasil;
		}

		public function data_pustakawan($niy){
			
			$query = "SELECT  pustakawan.niy, pustakawan.nama, pustakawan.tempat_lahir, pustakawan.tanggal_lahir, pustakawan.gendre, pustakawan.pendidikan, pustakawan.jabatan, pustakawan.keterangan_pendidikan, jenjang_jabatan.pankat, jenjang_jabatan.angka_kredit_dicapai, jenjang_jabatan.jebatan, jenjang_jabatan.angka_kredit_dicapai, jenjang_jabatan.id_jj, jenjang_jabatan.status from pustakawan join jenjang_jabatan on jenjang_jabatan.id_jj=pustakawan.jabatan where niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;
		}

		public function data_pendidikan_1a($niy){
			
			$query = "SELECT riwayat_kerja.riwayat, riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, riwayat_kerja.upload_data, riwayat_kerja.keterangan  from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat  where ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pendidikan_1av1($cari,$niy){
			
			$query = "SELECT riwayat_kerja.riwayat, riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.status_penilai from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pendidikan_1av2($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pendidikan_1av3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}


		public function data_diklat_1b($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat' and riwayat_kerja.niy='$niy'" ;

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_diklat_1bv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_diklat_1bv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_diklat_1bv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_perencanaan_2a($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat  from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_perencanaan_2av1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_perencanaan_2av2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_perencanaan_2av3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}


		public function data_monitoring_2b($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'MONITORING DAN EVALUASI PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_monitoring_2bv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'MONITORING DAN EVALUASI PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_monitoring_2bv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'MONITORING DAN EVALUASI PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_monitoring_2bv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'MONITORING DAN EVALUASI PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayanan_3a($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat  from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PELAYANAN TEKNIS' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayanan_3av1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PELAYANAN TEKNIS' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayanan_3av2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat  from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PELAYANAN TEKNIS' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayanan_3av3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PELAYANAN TEKNIS' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayanan_3b($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PELAYANAN PEMUSTAKA' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayanan_3bv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PELAYANAN PEMUSTAKA' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayanan_3bv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PELAYANAN PEMUSTAKA' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayanan_3bv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PELAYANAN PEMUSTAKA' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4a($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENGEMBANGAN KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4av1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENGEMBANGAN KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4av2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENGEMBANGAN KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4av3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENGEMBANGAN KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4b($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'MENGANALISA/MENGKRITISI KARYA KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4bv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'MENGANALISA/MENGKRITISI KARYA KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4bv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data riwayat_kerja.keterangan, riwayat_kerja.riwayat  from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'MENGANALISA/MENGKRITISI KARYA KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4bv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'MENGANALISA/MENGKRITISI KARYA KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4c($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENELAAH PENGEMBANGAN SISTEM KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4cv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENELAAH PENGEMBANGAN SISTEM KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4cv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENELAAH PENGEMBANGAN SISTEM KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangan_4cv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENELAAH PENGEMBANGAN SISTEM KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_karya_tulis_5a($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_karya_tulis_5av1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_karya_tulis_5av2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_karya_tulis_5av3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penerjemah_5b($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_penerjemah_5bv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penerjemah_5bv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penerjemah_5bv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penyusun_5c($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_penyusun_5cv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penyusun_5cv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penyusun_5cv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelatihan_6a($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENGAJAR/PELATIH ADA DIKLAT FUNGSIONAL/TEKIS BIDANG KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_pelatihan_6av1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PENGAJAR/PELATIH ADA DIKLAT FUNGSIONAL/TEKIS BIDANG KEPUSTAKAWANAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelatihan_6av2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENGAJAR/PELATIH ADA DIKLAT FUNGSIONAL/TEKIS BIDANG KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelatihan_6av3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PENGAJAR/PELATIH ADA DIKLAT FUNGSIONAL/TEKIS BIDANG KEPUSTAKAWANAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_seminar_6b($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat  where ringkasan_peraturan.butir = 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_seminar_6bv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_seminar_6bv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_seminar_6bv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_organisasi_6c($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'KEANGGOTAAN DALAM ORGANISASI PROFESI' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_organisasi_6cv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'KEANGGOTAAN DALAM ORGANISASI PROFESI' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_organisasi_6cv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'KEANGGOTAAN DALAM ORGANISASI PROFESI' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_organisasi_6cv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'KEANGGOTAAN DALAM ORGANISASI PROFESI' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penghargaan_6d($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PEROLEHAN PENGHARGAAN/TANDA JASA' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_penghargaan_6dv1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'PEROLEHAN PENGHARGAAN/TANDA JASA' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penghargaan_6dv2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PEROLEHAN PENGHARGAAN/TANDA JASA' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_penghargaan_6dv3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'PEROLEHAN PENGHARGAAN/TANDA JASA' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_gelar_6e($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_gelar_6ev1($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_gelar_6ev2($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload_data, riwayat_kerja.keterangan, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_gelar_6ev3($cari,$niy){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA' where riwayat_kerja.tanggal like '%$cari%' or ringkasan_peraturan.rincian like '%$cari%' or riwayat_kerja.angka_kredit_saya like '%cari%' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}




		public function data_lihat($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='PENDIDIKAN' where niy='$niy' LIMIT 1 ";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_lihat1($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='PENGELOLAAN PERPUSTAKAAN'  where niy='$niy' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_lihat2($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='PELAYANAN PERPUSTAKAAN'  where niy='$niy' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_lihat3($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='PENGEMBANGAN SISTEM  KEPUSTAKAWANAN'  where niy='$niy' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_lihat4($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='PENGEMBANGAN PROFESI'  where niy='$niy' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}

			public function data_lihat5($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='PENUNJANG TUGAS PUSTAKAWAN'  where niy='$niy' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}


		public function total_keseluruhan($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat join nilai on riwayat_kerja.id_riwayat=nilai.id_riwayat where riwayat_kerja.niy= '$niy' and nilai.statusnilai='sudah_tercukupi'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function total_keseluruhan22($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat join nilai on riwayat_kerja.id_riwayat=nilai.id_riwayat where riwayat_kerja.niy= '$niy' ";

			$this->eksekusi($query);
			return $this->hasil;

		}

		
		


		public function pencarian1($cari){
			
			$query = " SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen = 'pendidikan' where tanggal like '%$cari%'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function pencarian2($cari){
			
			$query = " SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen = 'Diklat' where tanggal like '%$cari%'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function pencarian3($cari){
			
			$query = " SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen = 'Pelayanan Perpustakaan' where tanggal like '%$cari%'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function pencarian_rp($cari){
			
			$query = "SELECT * from ringkasan_peraturan where komponen like '%$cari%'";

			$this->eksekusi($query);
			return $this->hasil;

		}



		public function ubahprofil($niy,$nama,$tanggal_lahir,$gendre,$pendidikan,$tempat_lahir,$jabatan,$keterangan_pendidikan){
			
			$query = "UPDATE pustakawan set niy='$niy', nama='$nama', tanggal_lahir='$tanggal_lahir', gendre='$gendre', pendidikan='$pendidikan', tempat_lahir='$tempat_lahir', jabatan='$jabatan', keterangan_pendidikan='$keterangan_pendidikan' where niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahprofil1($jabatan,$niy){
			
			$query = "UPDATE pustakawan SET jabatan='$jabatan' WHERE niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahprofil2($status,$niy){
			
			$query = "UPDATE riwayat_kerja SET status_riwayat ='$status' WHERE niy='$niy' and status_riwayat='baru'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahprofil3($status,$niy){
			
			$query = "UPDATE riwayat_kerja SET status_riwayat ='$status' WHERE niy='$niy' and status_riwayat='sudah lama mengajukan' and status_penilai='sudah diperbaiki'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		

		public function ubahriwayat($riwayat, $tanggal, $keterangan, $niy, $id_riwayat){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahriwayat1($riwayat, $tanggal, $keterangan, $niy, $id_riwayat, $upload_data){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', upload_data='$upload_data' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahriwayat2($riwayat, $tanggal, $keterangan, $niy, $id_riwayat, $status_penilai){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', status_penilai = '$status_penilai' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}

			public function ubahriwayat3($riwayat, $tanggal, $keterangan, $niy, $id_riwayat, $upload_data, $status_penilai){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', upload_data='$upload_data', status_penilai='$status_penilai' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}



		public function ubahriwayat0($riwayat, $tanggal, $keterangan,$angka_kredit_saya, $niy, $id_riwayat){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', angka_kredit_saya='$angka_kredit_saya' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahriwayat1a($riwayat, $tanggal, $keterangan, $angka_k1, $niy, $id_riwayat, $upload_data){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', upload_data='$upload_data', angka_kredit_saya='$angka_k1' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahriwayat2a($riwayat, $tanggal, $keterangan, $angka_k1, $niy, $id_riwayat, $status_penilai){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', angka_kredit_saya='$angka_k1' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}


		public function ubahriwayat3a($riwayat, $tanggal, $keterangan, $angka_k1, $niy, $id_riwayat, $upload_data, $status_penilai){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', upload_data='$upload_data', angka_kredit_saya='$angka_k1' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}



		public function ubahriwayat0b($riwayat, $tanggal, $keterangan, $niy, $id_riwayat, $angka_kredit_saya){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', angka_kredit_saya='$angka_kredit_saya' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahriwayat1b($riwayat, $tanggal, $keterangan, $niy, $id_riwayat, $upload_data, $angka_kredit_saya){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', upload_data='$upload_data', angka_kredit_saya='$angka_kredit_saya'  WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahriwayat2b($riwayat, $tanggal, $keterangan, $niy, $id_riwayat, $angka_kredit_saya){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', angka_kredit_saya='$angka_kredit_saya'  WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function ubahriwayat3b($riwayat, $tanggal, $keterangan, $niy, $id_riwayat, $upload_data, $angka_kredit_saya){
			
			$query = "UPDATE riwayat_kerja SET riwayat ='$riwayat', tanggal='$tanggal', keterangan='$keterangan', upload_data='$upload_data', angka_kredit_saya='$angka_kredit_saya' WHERE niy='$niy' and id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}



		public function ubahringkasan($komponen, $butir, $rincian, $angka_kredit, $id){
			
			$query = "UPDATE ringkasan_peraturan SET komponen='$komponen', butir='$butir', rincian='$rincian', angka_kredit='$angka_kredit' WHERE id_rp='$id'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function datariwayat($id_riwayat){
			
			$query = "SELECT * from riwayat_kerja where id_riwayat='$id_riwayat'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function dataringkasan(){
			
			$query = "SELECT * from ringkasan_peraturan where status='ahli'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		

		public function inputringkasan($komponen, $butir, $rincian, $angka_kredit, $status){ 
			

			$query = "INSERT INTO ringkasan_peraturan VALUES ('$komponen','$butir','$rincian','$angka_kredit','$status','id_rp')";
			$this->eksekusi($query);
			return $this->hasil;
		}







		public function data($niy){
			
			$query = "SELECT  pustakawan.niy, pustakawan.nama, jenjang_jabatan.jebatan, jenjang_jabatan.pankat, pustakawan.jabatan,jenjang_jabatan.status, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total, riwayat_kerja.status_riwayat as status1, riwayat_kerja.id_riwayat from pustakawan join riwayat_kerja on pustakawan.niy=riwayat_kerja.niy join jenjang_jabatan on jenjang_jabatan.id_jj=pustakawan.jabatan join ringkasan_peraturan on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where pustakawan.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function cek($niy){
			
			$query = "SELECT *  from riwayat_kerja where niy='$niy' and status_riwayat='baru' limit 1";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function cek1($niy){
			
			$query = "SELECT *  from riwayat_kerja where niy='$niy' and status_riwayat='lama'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function cek3($niy){
			
			$query = "SELECT *  from riwayat_kerja where niy='$niy' and status_penilai='sudah diperbaiki' and status_riwayat='sudah lama mengajukan' limit 1";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function cek4($niy){
			
			$query = "SELECT *  from riwayat_kerja where niy='$niy' and status_penilai='perbaikan'  limit 1";

			$this->eksekusi($query);
			return $this->hasil;

		}



		

		public function input_data_user($niy,$nama,$tanggal_lahir,$gendre,$pendidikan,$tempat_lahir,$keterangan_pendidikan){
			
			$query = "INSERT INTO pustakawan VALUES ('$niy','$nama','$tanggal_lahir','$gendre','$pendidikan','$tempat_lahir','xx-0000','$keterangan_pendidikan')";

			$this->eksekusi($query);
			return $this->hasil;

		}




		public function input_pendidikan_1a($riwayat,$angka_kredit_saya,$niy,$tanggal,$upload_data,$Keterangan,$status){ 
			

			$query = "INSERT INTO riwayat_kerja VALUES ('$riwayat','$angka_kredit_saya','$niy','id_riwayat','$tanggal','$upload_data', '$Keterangan','$status')";
			$this->eksekusi($query);
			return $this->hasil;
		}

		public function delete_pendidikan_1a($id){ 
			
			$query="DELETE FROM riwayat_kerja WHERE id_riwayat = '$id'";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function delete_ringkasan_peraturan($id){ 
			
			$query="DELETE FROM ringkasan_peraturan WHERE id_rp = '$id'";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}


		public function jenjang_jabatan(){ 
			
			$query="SELECT * from jenjang_jabatan ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function lihathasildihome($niy){ 
			
			$query="SELECT penilai.nidn, penilai.nama, riwayat_kerja.id_riwayat, ringkasan_peraturan.komponen, ringkasan_peraturan.butir, ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya, nilai.statusnilai, nilai.keterangan from riwayat_kerja join ringkasan_peraturan on riwayat_kerja.riwayat=ringkasan_peraturan.id_rp join nilai on riwayat_kerja.id_riwayat=nilai.id_riwayat join penilai on penilai.nidn=nilai.nidn where niy='$niy'";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}
		




		public function ringkasan_peraturan1(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan2(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'DIKLATFUNGSIONAL/TEKNIS KEPUSTAKAWANAN serta memperoleh Surat Tanda Tamat Pendidikan dan Pelatihan (STTPP) atau Sertifikat'";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan3(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PERENCANAAN PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan4(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'MONITORING DAN EVALUASI PENYELENGGARAAN KEGIATAN PERPUSTAKAAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan5(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PELAYANAN TEKNIS' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan6(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PELAYANAN PEMUSTAKA' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}
		public function ringkasan_peraturan7(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PENGEMBANGAN KEPUSTAKAWANAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan8(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'MENGANALISA/MENGKRITISI KARYA KEPUSTAKAWANAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan9(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PENELAAH PENGEMBANGAN SISTEM KEPUSTAKAWANAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan10(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'MEMBUAT KARYA TULIS/KARYA ILMIAH DI BIDANG KEPUSTAKAWANAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan11(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PENERJEMAHAN/PENYADURAN BUKU DAN/ATAU BAHAN-BAHAN LAIN DI BIDANG KEPUSTAKAWANAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan12(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PENYUSUNAN BUKU PEDOMAN/KETENTUAN PELAKSANAAN/KETENTUAN TEKNIS DI BIDANG KEPUSTAKAWANAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}
		public function ringkasan_peraturan13(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PENGAJAR/PELATIH ADA DIKLAT FUNGSIONAL/TEKIS BIDANG KEPUSTAKAWANAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}
		public function ringkasan_peraturan14(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PERAN SERTA DALAM SEMINAR/LOKAKARYA/KONFERENSI DI BIDANG KEPUSTAKAWAN' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}
		public function ringkasan_peraturan15(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'KEANGGOTAAN DALAM ORGANISASI PROFESI' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}
		public function ringkasan_peraturan16(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'PEROLEHAN PENGHARGAAN/TANDA JASA' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}
		public function ringkasan_peraturan17(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'MEMPEROLEH GELAR/IJAZAH KESARJANAAN LAINNYA' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}


		



	

	}

 ?>