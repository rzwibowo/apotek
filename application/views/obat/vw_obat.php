<section class="section">
	<div class="container">

		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Obat</th>
					<th>Nama Obat</th>
					<th>Golongan</th>
					<th>Stok</th>
					<th>Harga Satuan</th>
					<th>Tanggal Kadaluarsa</th>
				</tr>
			</thead>

			<?php
				$no=1;
				foreach($obat as $row){
			?>
			<tbody>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $row->kode_obat ?></td>
					<td><?php echo $row->nama_obat ?></td>
					<td><?php echo $row->golongan ?></td>
					<td><?php echo $row->stok_obat ?></td>
					<td><?php echo $row->harga_satuan ?></td>
					<td><?php echo $row->tgl_kadaluarsa ?></td>
					<td>
                        <?php echo anchor('obat/edit/'.$row->id_obat,'<i class="fa fa-pencil" aria-hidden="true"></i>','class="button is-info"'); ?>
                        <?php echo anchor('obat/view/'.$row->id_obat,'<i class="fa fa-info" aria-hidden="true"></i>','class="button is-info"'); ?>
          </td>
				</tr>
			</tbody>
			<?php }	?>
		</table>
		<nav class="level">
				<div class="level-right">
						<div class="level-item">
								<?php echo anchor('obat/add_obat','<i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambah Data','class="button is-primary"'); ?>
						</div>
				</div>
		</nav>
	</div>
</section>
