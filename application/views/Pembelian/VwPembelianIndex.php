<div class="page-header">
	<h1>Daftar Pembelian</h1>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Tanggal Pembelian</th>
				<th>Supplier</th>
				<th>Total Harga Pembelian</th>
				<th>Total Jumlah Obat</th>
				<th>Status Pembelian</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
		<?php
			$no=1;
			foreach($pembelian as $row){
		?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row->TanggalPembelian ?></td>
				<td><?php echo $row->NamaSupplier ?></td>
				<td><?php echo $row->TotalHargaBeli ?></td>
				<td><?php echo $row->TotalJumlahObat ?></td>
				<td><?php echo $row->StatusPembelian ?></td>
				<td class="text-center">
					<?php echo anchor('pembelian/Edit/'.$row->IdPembelian,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-outline-warning"'); ?>
					<?php echo anchor('pembelian/View/'.$row->IdPembelian,'<i class="fa fa-info" aria-hidden="true"></i>','class="btn btn-outline-info"'); ?>
				</td>
			</tr>
		<?php }	?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="6"></td>
				<td class="text-right">
					<?php echo anchor('pembelian/AddPembelian','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="btn btn-primary"'); ?>
				</td>
			</tr>
		</tfoot>
	</table>
</div>