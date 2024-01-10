<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body {
			font-family: "arial";
		}
	</style>
</head>
<body>


	<?php
	$showTanggal = $this->db->select("*, DATE(tanggal_mulai) as mulai, DATE(tanggal_selesai) as selesai, TIME(tanggal_mulai) as jam_mulai, TIME(tanggal_selesai) as jam_selesai")->get_where("m_agenda",array('id'=>$_REQUEST['id']))->row_array();
	$no=1;
	$q = $this->db->query("
		SELECT * FROM m_penugasan as a 
		LEFT JOIN m_pegawai as b ON a.id_pegawai = b.id
		WHERE a.id_agenda='".$_REQUEST['id']."'
		")->result_array();
		foreach ($q as $key => $data) :?>

			<style>
				.separator {
					width: 100%;
					border-bottom: 2px solid #333;
					margin-top: 10px;
				}
			</style>
			<table width="100%" style="width: 100% !important">
				<tr>
					<td rowspan="1" width="25%"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg/768px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png" style="width: 70px; height: 70px"></td>
					<td width="75%" style="font-weight: bold; text-align: center; line-height: 10px">
						<p  style="font-size: 12px;">PEMERINTAH KABUPATEN JOMBANG</p>
						<p style="font-size: 12px;">DINAS PENDIDIKAN DAN KEBUDAYAAN</p>
						<p style="font-size: 12px;">SMP NEGERI 1 MOJOWARNO</p>
						<p style="font-size: 10px;">Jalan Merdeka, Mojojejer, Mojowarno, 61474</p>
						<p style="font-size: 10px;">Telepon (0321) 495489 Email: smpn_1mjw@yahoo.co.id</p>
						<p style="font-size: 10px;">Website: <a href="http://smpn1mojowarno.sch.id">http://smpn1mojowarno.sch.id</a></p>
					</td>
				</tr>
			</table>

			<div class="separator"></div>
			<br>
			<br>
			<center style="float: right;">
				<table>
					<tr>
						<td width="50%"></td>
						<td>
							Nomor    : 800/186/415.16.19.32/2023<br>
							Lampiran : 1
						</td>
					</tr>
				</table>
			</center>
			<br>
			<br>
			<br>
			<br>
			<center>
				<b style="text-align: center;">SURAT PERINTAH PERJALANAN DINAS </b><br>
				<b style="text-align: center;">(SPPD)</b>
			</center>
			<br>
			<br>

			<style type="text/css">
				.table {
					width: 100vh;
					border-collapse: collapse;
				}

				.th, .td {
					border: 1px solid black;
					text-transform: capitalize;
					padding-left: 10px;
					text-align: left;
				}
			</style>

			<table class="table" width="100%" style="text-align: center;" border="1px">
				<tr>
					<td width="60%" nowrap="" colspan="2" style="text-align: left; padding: 7px; ">1. Pejabat yang memberi wewenang </td>
					<td width="40%" style="text-align: left; padding: 7px;"> Kepala SMPN 1 Mojowarno </td>
				</tr>
				<tr>
					<td width="60%" nowrap="" colspan="2" style="text-align: left; padding: 7px; ">2. Nama/NIP pegawai yang diperintahkan </td>
					<td width="40%" style="text-align: left; padding: 7px;"><?php echo $data['nama']; ?> <br>NIP : <?php echo $data['nip'] ?></td>
				</tr>
				<tr>
					<td width="60%" nowrap="" colspan="2" style="text-align: left; padding: 7px; " nowrap=""> 3. 
						<ol type="a">
							<li>Pangkat Golongan</li>
							<li>Jabatan Instansi</li>
							<li>Tingkat menurut peraturan perjalanan Dinas</li>
						</ol> 
					</td>
					<td width="40%" style="text-align: left; padding: 7px;">
						<ol type="a">
							<li><?php echo ucfirst($data['nama']); ?></li>
							<li><?php echo $data['jabatan'] ?></li>
							<li>-</li>
						</ol>
					</td>
				</tr>
				<tr>
					<td width="60%" nowrap="" colspan="2" style="text-align: left; padding: 7px; ">4. Maksud perjalanan dinas </td>
					<td width="40%" style="text-align: left; padding: 7px;"><b><?php echo $showTanggal['agenda']; ?></b></td>
				</tr>
				<tr>
					<td width="60%" nowrap="" colspan="2" style="text-align: left; padding: 7px; ">5. Alat Angkut yang dipergunakan </td>
					<td width="40%" style="text-align: left; padding: 7px;">1. Tranportasi Darat</td>
				</tr>
				<tr>
					<td width="60%" nowrap="" colspan="2" style="text-align: left; padding: 7px; ">6.
						<ol type="a">
							<li>Tempat Berangkat</li>
							<li>Tujuan</li>
						</ol> 
					</td>
					<td width="40%" style="text-align: left; padding: 7px;">
						<ol type="a">
							<li>SMPN 1 Mojowarno</li>
							<li><?php echo $showTanggal['tempat']; ?></li>
						</ol> 
					</td>
				</tr>
				<tr>
					<td width="60%" nowrap="" colspan="2" style="text-align: left; padding: 7px; ">7.
						<ol type="a">
							<li>Lamanya Perjalanan Dinas</li>
							<li>Hari, Tanggal berangkat</li>
							<li>Hari, Tanggal kembali</li>
						</ol> 
					</td>
					<td width="40%"  style="text-align: left; padding: 7px;" colspan="2">
						<ol type="a">
							<li>1 Hari</li>
							<li><?php echo $showTanggal['mulai']; ?></li>
							<li><?php echo $showTanggal['selesai']; ?></li>
						</ol> 
					</td>
				</tr>
				<tr>
					<td style="text-align: left; padding: 7px; " colspan="2" width="60%">8. Pengikut
						<ol type="a">
							<li></li>
							<li></li>
						</ol> 
					</td>
					<td width="40%"  style="text-align: center; padding: 7px;" nowrap="">
						Keterangan
					</td>
				</tr>
				<tr>
					<td width="60%" colspan="2" style="text-align: left; padding: 7px; ">9. Pembebanan anggaran : 
						<ol type="a">
							<li>Instansi</li>
							<li>Fungsi</li>
							<li>Fungsi/Program/Kegiatan</li>
						</ol> 
					</td>
					<td style="text-align: center; padding: 7px;"></td>
				</tr>
				<tr>
					<td width="60%" nowrap="" colspan="2" style="text-align: left; padding: 7px; ">10. Keterangan lain-lain</td>
					<td style="text-align: left; padding: 7px;">
						<br>
						<br>
						<br>
						<br>
					</td>
				</tr>
			</table>
			<br>

			<table width="100%">
				<tr>
					<td width="7%"></td>
					<td><i></i></td>
				</tr>

				<tr>
					<td width="7%"></td>
					<td width="40%"><center></center></td>
					<td width="40%" style="text-align: center;"><center>Mojowarno, 7 November 2023 <br>Kepala Sekolah,</center></td>
				</tr>

				<tr>
					<td></td>
					<td style="height: 50px"></td>
					<td style="text-align: center;"><br><br>
						<img style="width: 60px; width: 60px;" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Dra. LISTYOWATI, M.Pd. / Pembina Tk. 1 / NIP. 19660304 199003 2006&type=lampiran&cetak=true"> <br>
					</td>
				</tr>


				<tr>
					<td></td>
					<td style="font-weight: bold;"><center></center> </td>
					<td style="text-align: center; font-weight: bold;"><center style="font-size: 9px;">
						Dra. LISTYOWATI, M.Pd. 
						<br>Pembina Tk. 1
						<br>NIP. 19660304 199003 2006
					</center> </td>
				</tr>
			</table>
		</body>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	<?php endforeach; ?>
	</html>