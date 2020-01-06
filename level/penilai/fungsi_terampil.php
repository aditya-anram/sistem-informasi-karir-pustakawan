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

		public function data(){ //rizal
			
			$query = "SELECT * from pustakawan";
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


		public function inputpenilai($nidn,$nama){ //rizal
			

			$query = "INSERT penilai VALUES ('$nidn','$nama')";
			$this->eksekusi($query);
			return $this->hasil;
		}

		public function inputpenilai1($id,$nidn,$status,$id_riwayat,$keterangan){ //rizal
			

			$query = "INSERT nilai VALUES ('$id','$nidn','$status','$id_riwayat','$keterangan')";
			$this->eksekusi($query);
			return $this->hasil;
		}

		
		public function updatekredityangdisetujui($id_riwayat,$status_riwayat){ //rizal
			

			$query = "UPDATE riwayat_kerja SET status_riwayat='$status_riwayat' where id_riwayat='$id_riwayat'";
			$this->eksekusi($query);
			return $this->hasil;
		}
		public function updatekredityangdisetujui1($nip,$nama,$nilai,$keterangan,$id_riwayat){ //rizal
			

			$query = "UPDATE penilai SET nip='$nip', nama='$nama', nilai='$nilai', keterangan='$keterangan' where id_riwayat='$id_riwayat'";
			$this->eksekusi($query);
			return $this->hasil;
		}
		public function ubahbiodata($nidn,$nama){ //rizal
			

			$query = "UPDATE penilai SET nama='$nama' Where nidn='$nidn'";
			$this->eksekusi($query);
			return $this->hasil;
		}
		public function ubahnilai($id_riwayat,$statusnilai,$keterangan){ //rizal
			

			$query = "UPDATE nilai SET statusnilai='$statusnilai', keterangan='$keterangan' Where id_riwayat='$id_riwayat'";
			$this->eksekusi($query);
			return $this->hasil;
		}
		public function datapenilai($nidn){ //rizal
			

			$query = "SELECT * from penilai where nidn='$nidn'";
			$this->eksekusi($query);
			return $this->hasil;
		}


	public function lihatdatapustakawan($niy){ //rizal
	
			$query = "SELECT pustakawan.niy, pustakawan.nama, pustakawan.tanggal_lahir, pustakawan.gendre, pustakawan.pendidikan, pustakawan.tempat_lahir, jenjang_jabatan.jebatan, pustakawan.keterangan_pendidikan from pustakawan join jenjang_jabatan on pustakawan.jabatan=jenjang_jabatan.id_jj and pustakawan.niy='$niy'"; 

			$this->eksekusi($query);
			return $this->hasil;
				
		}

	public function hasilkaryawan($niy){ //rizal
	
			$query = "SELECT riwayat_kerja.niy, ringkasan_peraturan.komponen,riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit as hasil,riwayat_kerja.upload_data,ringkasan_peraturan.butir, ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya, riwayat_kerja.keterangan ,riwayat_kerja.status_riwayat, riwayat_kerja.riwayat, riwayat_kerja.id_riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where riwayat_kerja.niy ='$niy'"; 

			$this->eksekusi($query);
			return $this->hasil;
				
		}		
		public function hasilkaryawan1($niy){ //rizal
	
			$query = "SELECT riwayat_kerja.niy, ringkasan_peraturan.komponen,riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit as hasil,riwayat_kerja.upload_data,ringkasan_peraturan.butir, ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya, riwayat_kerja.keterangan ,riwayat_kerja.status_riwayat, riwayat_kerja.riwayat, riwayat_kerja.id_riwayat, nilai.keterangan, nilai.statusnilai from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat join nilai on riwayat_kerja.id_riwayat=nilai.id_riwayat where riwayat_kerja.niy ='$niy'"; 

			$this->eksekusi($query);
			return $this->hasil;
				
		}	

	public function jumlahhasilkegiatan($niy){ //rizal
	
			$query = "SELECT sum(riwayat_kerja.angka_kredit_saya) as kegiatan, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as kredit, ringkasan_peraturan.komponen, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen='pendidikan' where status_riwayat='lama' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;				
		}

	public function jumlahhasilkegiatan1($niy){ //rizal
	
			$query = "SELECT sum(riwayat_kerja.angka_kredit_saya) as kegiatan, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as kredit, ringkasan_peraturan.komponen, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen='PENGELOLAAN PERPUSTAKAAN' where status_riwayat='lama' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;				
		}

	public function jumlahhasilkegiatan2($niy){ //rizal
	
			$query = "SELECT sum(riwayat_kerja.angka_kredit_saya) as kegiatan, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as kredit, ringkasan_peraturan.komponen, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen='PELAYANAN PERPUSTAKAAN' where status_riwayat='lama' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;				
		}

	public function jumlahhasilkegiatan3($niy){ //rizal
	
			$query = "SELECT sum(riwayat_kerja.angka_kredit_saya) as kegiatan, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as kredit, ringkasan_peraturan.komponen, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen='PENGEMBANGAN SISTEM  KEPUSTAKAWANAN' where status_riwayat='lama' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;				
		}

	public function jumlahhasilkegiatan4($niy){ //rizal
	
			$query = "SELECT sum(riwayat_kerja.angka_kredit_saya) as kegiatan, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as kredit, ringkasan_peraturan.komponen, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen='PENGEMBANGAN PROFESI' where status_riwayat='lama' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;				
		}

	public function jumlahhasilkegiatan5($niy){ //rizal
	
			$query = "SELECT sum(riwayat_kerja.angka_kredit_saya) as kegiatan, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as kredit, ringkasan_peraturan.komponen, riwayat_kerja.riwayat from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat and ringkasan_peraturan.komponen='PENUNJANG TUGAS PUSTAKAWAN' where status_riwayat='lama' and riwayat_kerja.niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;				
		}

	public function cek($niy){ //rizal
	
			$query = "SELECT * from riwayat_kerja where status_riwayat='lama' and niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;				
		}						

			

		public function data_pustakawan($niy){
			
			$query = "SELECT  pustakawan.niy, pustakawan.nama, pustakawan.tempat_lahir, pustakawan.tanggal_lahir, pustakawan.gendre, pustakawan.pendidikan, pustakawan.jabatan, pustakawan.keterangan_pendidikan, jenjang_jabatan.pankat, pustakawan.gambar_profil from pustakawan join jenjang_jabatan on jenjang_jabatan.id_jj=pustakawan.jabatan where niy='$niy'";

			$this->eksekusi($query);
			return $this->hasil;
		}

		public function data_pendidikan_1a($niy){
			
			$query = "SELECT riwayat_kerja.tanggal, riwayat_kerja.id_riwayat, riwayat_kerja.niy,  ringkasan_peraturan.rincian, ringkasan_peraturan.angka_kredit, riwayat_kerja.angka_kredit_saya as angka_k1, riwayat_kerja.upload_data from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where ringkasan_peraturan.butir = 'Pendidikan Sekolah dan Memperoleh Gelar/Ijazah' and riwayat_kerja.niy='$niy'";

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

		public function total_keseluruhan($niy){ //rizal
			
			$query = "SELECT  SUM(riwayat_kerja.angka_kredit_saya) as kredit, ringkasan_peraturan.komponen, sum(riwayat_kerja.angka_kredit_saya*ringkasan_peraturan.angka_kredit) as total from ringkasan_peraturan join riwayat_kerja on ringkasan_peraturan.id_rp=riwayat_kerja.riwayat where status_riwayat='lama'and riwayat_kerja.niy='$niy'";

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









		

		public function input_data_user($niy,$nama,$tanggal_lahir,$gendre,$pendidikan,$tempat_lahir,$keterangan_pendidikan,$gambar){
			
			$query = "INSERT INTO pustakawan VALUES ('$niy','$nama','$tanggal_lahir','$gendre','$pendidikan','$tempat_lahir','xx-0000','$keterangan_pendidikan','$gambar')";

			$this->eksekusi($query);
			return $this->hasil;

		}



		public function input_pendidikan_1a($riwayat,$angka_kredit_saya,$niy,$tanggal,$upload_data){ 
			

			$query = "INSERT INTO riwayat_kerja VALUES ('$riwayat','$angka_kredit_saya','$niy','id_riwayat','$tanggal','$upload_data')";
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