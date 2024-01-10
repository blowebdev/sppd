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

	<style>
		.separator {
			width: 100%;
			border-bottom: 2px solid #333;
			margin-top: 10px;
		}
	</style>
	<table width="100%" style="width: 100% !important">
		<tr>
			<td rowspan="1" width="25%"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg/768px-Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg.png" style="width: 100px; height: 100px"></td>
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
	<center style="float: right;">
		<b style="text-align: center;">SURAT TUGAS</b><br>
		<b style="text-align: center;">Nomor: 800/186/415.16.19.32/2023</b>
	</center>
	<?php
	$showTanggal = $this->db->select("*, DATE(tanggal_mulai) as mulai, DATE(tanggal_selesai) as selesai, TIME(tanggal_mulai) as jam_mulai, TIME(tanggal_selesai) as jam_selesai")->get_where("m_agenda",array('id'=>$_REQUEST['id']))->row_array();
	?>
	<table>
		<tr>
			<td colspan="2" style="text-align: left;">Dasar:</td>
		</tr>
		<tr>
			<td width="40px"></td>
			<td width="100%">
				1. Peraturan Daerah Nomor 7 Tahun 2008 tentang Organisasi dan Tata Kerja Dinas Daerah Kabupaten Jombang <br>
				2. Peraturan Bupati Jombang Nomor 16 Tahun 2009 tentang Tugas Pokok dan Fungsi Dinas Pendidikan Kabupaten Jombang. <br>
				3. Dokumen Kegiatan dan Anggaran Sekolah (DKAS) Tahun Pelajaran 2023/2024.
				4. Surat Undangan dari: <br>
				<table style="width: 100%;">
					<tr>
						<td width="50px" nowrap="">Tanggal </td>
						<td> : <?php echo tgl_indo($showTanggal['tanggal_surat']); ?></td>
					</tr>
					<tr>
						<td>Nomor </td>
						<td> : <?php echo $showTanggal['nomor_surat']; ?></td>
					</tr>
					<tr>
						<td>Perihal </td>
						<td> : <?php echo $showTanggal['perihal']; ?></td>
					</tr>
				</table>
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<p style="text-align: center;">Kepala SMP Negeri 1 Mojowarno <br> MENUGASKAN</p>

				<table class="table" width="100%" style="text-align: center;">
					<tr>
						<th class="th" width="30px"> No. </th>
						<th class="th"> Nama</th>
						<th class="th"> NIP</th>
						<th class="th"> Jabatan</th>
					</tr>
					<?php 
					$no=1;
					$q = $this->db->query("
						SELECT * FROM m_penugasan as a 
						LEFT JOIN m_pegawai as b ON a.id_pegawai = b.id
						WHERE a.id_agenda='".$_REQUEST['id']."'
						")->result_array();
					foreach ($q as $key => $data) :

						?>
					<tr>
						<td class="td" width="30px" nowrap="">  <?php echo $no++ ?>.</td>
						<td class="td" style="text-transform: capitalize;"> <?php echo ucfirst($data['nama']); ?> </td>
						<td class="td"> <?php echo $data['nip'] ?></td>
						<td class="td"> <?php echo $data['jabatan'] ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><br>
				<p> Untuk Kegiatan <b><?php echo $showTanggal['agenda']; ?></b> yang dilaksanakan pada:</p>
				<table style="width: 100%;">
					<tr>
						<td width="50px">Tanggal </td>
						<td> : <?php echo tgl_indo($showTanggal['mulai'],true); ?> s/d <?php echo tgl_indo($showTanggal['selesai'],true); ?></td>
					</tr>
					<tr>
						<td>Jam </td>
						<td> : <?php echo $showTanggal['jam_mulai']." - ".$showTanggal['jam_selesai']; ?></td>
					</tr>
					<tr>
						<td>Tempat </td>
						<td> : <?php echo $showTanggal['tempat']; ?></td>
					</tr>
				</table>
				<p>Demikian surat tugas ini untuk dilaksanakan dengan penuh rasa tanggung jawab.</p> <br>
			</td>
		</tr>
	</table>
	<style type="text/css">
		.table {
			width: 100%;
			border-collapse: collapse;
		}

		.th, .td {
			border: 1px solid black;
			text-transform: capitalize;
			padding-left: 10px;
			text-align: left;
		}
	</style>

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
			<td style="text-align: center; font-weight: bold;"><center>
				Dra. LISTYOWATI, M.Pd. 
				<br>Pembina Tk. 1
				<br>NIP. 19660304 199003 2006
			</center> </td>
		</tr>
	</table>
</body>
</html>