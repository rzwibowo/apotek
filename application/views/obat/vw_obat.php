<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
	<title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>
	<h1>Mengenal Model Pada Codeigniter | MalasNgoding.com</h1>
	<table border="1">
		<tr>
			<th>No.</th>
			<th>Kode Obat</th>
			<th>Nama Obat</th>
			<th>Golongan</th>
			<th>Stok</th>
			<th>Harga Satuan</th>
			<th>Tanggal Kadaluarsa</th>
		</tr>
		<?php
			$no=1;
			foreach($obat as $o){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $o->kd_obat ?></td>
			<td><?php echo $o->nama_obat ?></td>
			<td><?php echo $o->golongan ?></td>
			<td><?php echo $o->stok_obat ?></td>
			<td><?php echo $o->harga_satuan ?></td>
			<td><?php echo $o->tgl_kadaluarsa ?></td>
		</tr>
		<?php }	?>
	</table>
	</body>
</body>
</html>