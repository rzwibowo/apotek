<div class="page-header">
	<h1>Daftar Supplier</h1>
</div>

<div class="table-responsive">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Supplier</th>
				<th>Nomor Telepon</th>
				<th>Alamat</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
		<?php
			$no=1;
			foreach($supplier as $row){
		?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row->NamaSupplier ?></td>
				<td><?php echo $row->NomorTelepon ?></td>
				<td><?php echo $row->Alamat ?></td>
				<td><?php echo ($row->Status==1? "Aktif":"Non Aktif"); ?></td>
				<td class="text-center">
					<?php echo anchor('supplier/Edit/'.$row->IdSupplier,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-outline-warning"'); ?>
					<?php echo anchor('supplier/View/'.$row->IdSupplier,'<i class="fa fa-info" aria-hidden="true"></i>','class="btn btn-outline-info"'); ?>
				</td>
			</tr>
		<?php }	?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5"></td>
				<td class="text-right">
					<?php echo anchor('supplier/AddSupplier','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="btn btn-primary"'); ?>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
