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

		public function data_pustakawan($niy){
			
			$query = "SELECT  pustakawan.niy, pustakawan.nama, pustakawan.tempat_lahir, pustakawan.tanggal_lahir, pustakawan.gendre, pustakawan.pendidikan, pustakawan.Jabatan, pustakawan.keterangan_pendidikan, jenjang_jabatan.pankat from pustakawan join jenjang_jabatan on jenjang_jabatan.id_jj=pustakawan.jabatan where niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;
		}

		public function data_pendidikan_1a($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status, riwayat_kerja.upload from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pendidikan_1av2(){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pendidikan_1av1($cari){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' where tanggal like '%$cari%'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pendidikan_1av3($cari){
			
			$query = "SELECT riwayat_kerja.tanggal, count(riwayat_kerja.id_riwayat) as jumlah_kegiatan, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' where tanggal like '%$cari%'";

			$this->eksekusi($query);
			return $this->hasil;

		}


		public function data_diklat_2a(){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Diklat Bidang Kepustakawanan Dalam Jabatan Fungsio'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pelayananperpustakaan_3a(){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Pelayanan Teknis'";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_pelayananperpustakaan1_3a(){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Pelayanan Pemustaka'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangansistem_4a(){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Pengembangan Sistem Kepustakawanan'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangansistem1_4a(){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Pengembangan Kepustakawanan'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_pengembangansistem2_4a(){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, ringkasan_peraturan.status from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Menganalisa/Mengkritisi Karya Kepustakawanan'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_lihat(){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, ringkasan_peraturan.angka_kredit, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='pendidikan' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function data_lihat1(){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='Diklat' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function data_lihat2(){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen ='Pengembangan Sistem  Kepustakawanan' LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function total_keseluruhan($niy){
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where riwayat_kerja.niy= '$niy'";

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









		

		public function input_data_user($niy,$nama,$tanggal_lahir,$gendre,$pendidikan,$tempat_lahir,$jabatan,$keterangan_pendidikan){
			
			$query = "INSERT INTO pustakawan VALUES ('$niy','$nama','$tanggal_lahir','$gendre','$pendidikan','$tempat_lahir','$jabatan','$keterangan_pendidikan')";

			$this->eksekusi($query);
			return $this->hasil;

		}



		public function input_pendidikan_1a($riwayat,$angka_kredit_saya,$niy,$tanggal,$upload){ 
			

			$query = "INSERT INTO riwayat_kerja VALUES ('$riwayat','$angka_kredit_saya','$niy','id_riwayat','$tanggal','$upload')";
			$this->eksekusi($query);
			return $this->hasil;
		}

		public function delete_pendidikan_1a($id){ 
			
			$query="DELETE FROM riwayat_kerja WHERE id_riwayat = '$id'";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function jenjang_jabatan(){ 
			
			$query="SELECT * from jenjang_jabatan ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan1(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan2(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'Menganalisa/Mengkritisi Karya Kepustakawanan'";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan3(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'Diklat Bidang Kepustakawanan Dalam Jabatan Fungsio' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan4(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}

		public function ringkasan_peraturan5(){ 
			
			$query="SELECT * from ringkasan_peraturan where butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' ";
			 
			$this->eksekusi($query); 
			return $this->hasil; 

		}



		












		//search
		public function CariDataMahasiswaBerdasarkanNim($nim){ //sudah
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as id_penguji, penjadwalan.id_jadwal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen.nim=$nim LIMIT 1";

			$this->eksekusi($query);  
			return $this->hasil; 
		}

		//select
		public function lihatsempropmahasiswa($nim){  
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as id_penguji, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status,penjadwalan.id_jadwal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on 					mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where seminar_proposal.nim=$nim LIMIT 1";

			$this->eksekusi($query);
			return $this->hasil;		
		}

		//update
		public function UpdateNilaiDanStatusSemprop1($nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji){ 
			
			$query="UPDATE seminar_proposal SET nilai_proses_pembimbing='$nilai_proses_pembimbing', status='$status', nim='$nim', nilai_ujian_pembimbing='$nilai_ujian_pembimbing', nilai_ujian_penguji='$nilai_ujian_penguji' where nim='$nim'"; //qu
			$this->eksekusi($query); 
			return $this->hasil; 
		}

		//delete
		public function DeleteDataSemprop($nim){ //sudah
			
			$query="DELETE FROM seminar_proposal WHERE nim=$nim";
			
			$this->eksekusi($query); 
			return $this->hasil; 
		}	

	}

 ?>