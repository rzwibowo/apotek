<div class="page-head text-center">
	<h1>Daftar Golongan Obat</h1>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode Golongan</th>
				<th>Nama Golongan</th>
				<th>Tindakan</th>
			</tr>
		</thead>

		<tbody>
		<?php
			$no=1;
			foreach($gol_obat as $g){
		?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $g->kd_gol ?></td>
				<td><?php echo $g->golongan ?></td>
				<td class="text-center">
					<?php echo anchor('gol_obat/edit/'.$g->id_gol,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-outline-warning"'); ?>
					<?php echo anchor('gol_obat/view/'.$g->id_gol,'<i class="fa fa-info" aria-hidden="true"></i>','class="btn btn-outline-info"'); ?>
				</td>
			</tr>
		<?php }	?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3"></td>
				<td class="text-right">
					<?php echo anchor('gol_obat/add_gol_obat','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="btn btn-primary"'); ?>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
