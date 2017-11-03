<div class="page-header">
	<h1>Daftar Obat</h1>
</div>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Kode Obat</th>
				<th>Nama Obat</th>
				<th>Golongan</th>
				<th>Stok</th>
				<th>Harga Satuan</th>
				<th>Tanggal Kadaluarsa</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			<?php
				$no=$this->uri->segment('3')+1;
				foreach($obat as $row){
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $row->kode_obat ?></td>
				<td><?php echo $row->nama_obat ?></td>
				<td><?php echo $row->golongan ?></td>
				<td><?php echo $row->stok_obat ?></td>
				<td><?php echo $row->harga_satuan ?></td>
				<td><?php echo $row->tgl_kadaluarsa ?></td>
				<td class="text-center">
					<?php echo anchor('obat/edit/'.$row->id_obat,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-outline-warning"'); ?>
					<?php echo anchor('obat/view/'.$row->id_obat,'<i class="fa fa-info" aria-hidden="true"></i>','class="btn btn-outline-info"'); ?>
				</td>
			</tr>
			<?php }	?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7">
					<?php echo $this->pagination->create_links(); ?>
				</td>
				<td class="text-right">
					<?php echo anchor('obat/add_obat','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="btn btn-primary"'); ?>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
<!-- <div class="pull-right">
</div> -->

