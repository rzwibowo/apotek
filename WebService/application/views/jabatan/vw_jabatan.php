<div class="page-head text-center">
	<h1>Daftar Jabatan</h1>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode jabatan</th>
				<th>Nama Jabatan</th>
				<th>Tindakan</th>
			</tr>
		</thead>

		<tbody>
		<?php
			$no=1;
			foreach($jabatan as $row){
		?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row->kd_jbt ?></td>
				<td><?php echo $row->nama_jbt ?></td>
				<td class="text-center">
					<?php echo anchor('gol_obat/edit/'.$row->kd_jbt,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-info"'); ?>
				</td>
			</tr>
		<?php }	?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3"></td>
				<td class="text-right">
					<?php echo anchor('jabatan/add_jabatan','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="btn btn-primary"'); ?>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
