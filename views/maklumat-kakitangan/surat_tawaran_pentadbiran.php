<html>
<head>
 <title>Surat Tawaran | TAFHIM</title>
<style>
	.A4Portrait {	padding:30px; background-color:white; width:21cm; height:27.5cm; margin-left:auto; margin-right:auto; box-shadow: 0px 0px 30px rgba(50, 50, 50, 0.75); padding-left: 50px;padding-right: 50px; }
	p {
		padding-bottom: 10px;
	}
	</style>
</head>
<body onload="window.print()" class="A4Portrait">
<div style="padding-top: 100px"></div>
<table>
	<tr>
		<td>Rujukan</td><td>:</td><td><?= $model->rujukan_tawaran ?></td>
	</tr>
	<tr>
		<td>Tarikh</td><td>:</td><td><?= date("d M Y") ?></td>
	</tr>
</table>
<br />
<?= $model->nama ?>
<?= $model->alamat_surat_menyurat ?>  <br />
Tuan/ puan
<br /><br />	
<strong>TAWARAN JAWATAN</strong>
<p>
	Saya dengan hormatnya ingin merujuk kepada perkara di atas.
</p>
<p>
Tafhim Sdn Bhd dengan sukacitanya menawarkan Tuan/puan jawatan sebagai <?= $model->jawatan_sekarang ?> di <strong>Kelas Tahfiz Ummah</strong> dengan gaji beserta senarai tugas seperti berikut, mulai <?= date("d.m.Y",strtotime($model->tarikh_mula_kerja)) ?>
</p>
<table>
	<tr>
		<td>Gaji</td><td>:</td><td>RM <?= $model->gaji_asas ?> (<?= $model->peringkatgaji->peringkat_gaji ?>,<?= $model->tanggagaji->tangga_gaji ?>) + Elaun Perumahan 105</td>
	</tr>
	<tr>
		<td>Skim Gaji</td><td>:</td><td>RM <?= $model->skim_gaji_awal ?> x 52 sehingga RM <?= $model->skim_gaji ?> (T 16)</td>
	</tr>
</table>
	<ol>
		<li style="padding-bottom:10px;text-align: justify;">Tuan/puan diletakkan dalam tempoh percubaan selama <strong>6 bulan</strong> dari tarikh surat ini.</li>
		<li style="padding-bottom:10px;text-align: justify;"><strong>Tempoh Pengesahan Jawatan 6 Hingga 12 Bulan</strong></li>
		<li style="padding-bottom:10px;text-align: justify;">Dalam tempoh percubaan, perkhidmatan tuan/puan boleh ditamatkan dengan memberi satu (1) bulan notis atau dibayar sebulan gaji <strong>ATAU</strong> meletakkan jawatan dengan memberi satu (1) bulan notis atau membayar sebulan gaji. Selepas tempoh percubaan, tuan/puan boleh meletakkan jawatan dengan memberi dua (2) bulan notis atau membayar sebulan gaji sebagai ganti notis.</li>
		<li style="padding-bottom:10px;text-align: justify;">Waktu bekerja adalah dari 8.30 pagi - 12.45 tengahari; 2.30 - 5.00 petang. 
		</li>
		<li style="padding-bottom:10px;text-align: justify;">Tempoh umur persaraan telah ditetapkan sehingga  <strong>60 tahun</strong>.</li>
		<li style="padding-bottom:0px;text-align: justify;">Adalah menjadi peraturan Syarikat / Tahfiz untuk staf  <strong>TIDAK</strong> menyebarkan sebarang maklumat yang berkaitan syarikat kepada pihak luar. Mana-mana staf yang didapati berbuat demikian akan menerima tindakan yang tegas dan muktamad.</li>
		<li style="padding-bottom:0px;text-align: justify;">Segala perincian syarat dan tugasan tertakluk kepada Polisi YTP dan Prosedur Operasi Piawai KTU sebagaimana diterima pakai oleh KTU.</li>
	</ol>
<p>
	Diharapkan tuan/puan dapat memberikan khidmat yang cemerlang demi kelangsungan proses pendidikan rohani dan jasmani anak bangsa. Insya Allah.
</p>
<p>
Sekian, terima kasih.
<p>
Yang benar,
</p>
<p>
<img width="150px" src="<?php echo Yii::$app->request->baseUrl; ?>/image/tandatangan-hjrahman.jpg" /><br />
Hj Abd Rahman bin Mohd Yasin<br />
Pengarah    <br />
Tafhim Sdn Bhd
</p>
</body>
</html>